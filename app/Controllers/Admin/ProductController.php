<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends BaseController
{
    private ProductModel $products;

    public function __construct()
    {
        $this->products = new ProductModel();
    }

    public function index(): string
    {
        $products = $this->products
            ->select('products.*, product_categories.name as category_name')
            ->join('product_categories', 'product_categories.id = products.category_id')
            ->orderBy('product_categories.sort_order', 'ASC')
            ->orderBy('products.sort_order', 'ASC')
            ->findAll();

        return view('admin/products/index', ['title' => 'Ürünler | Yönetim Paneli', 'products' => $products]);
    }

    public function create(): string
    {
        return view('admin/products/form', $this->formData());
    }

    public function store()
    {
        $data = $this->validatedData();

        if ($data === null) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->products->insert($data);

        return redirect()->to(site_url('yonetim/urunler'))->with('success', 'Ürün eklendi.');
    }

    public function edit(int $id): string
    {
        return view('admin/products/form', $this->formData($this->findProduct($id)));
    }

    public function update(int $id)
    {
        $product = $this->findProduct($id);
        $data = $this->validatedData($product);

        if ($data === null) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->products->update($id, $data);

        return redirect()->to(site_url('yonetim/urunler'))->with('success', 'Ürün güncellendi.');
    }

    public function delete(int $id)
    {
        $this->findProduct($id);
        $this->products->delete($id);

        return redirect()->to(site_url('yonetim/urunler'))->with('success', 'Ürün kaldırıldı.');
    }

    private function formData(?array $product = null): array
    {
        return [
            'title' => ($product ? 'Ürünü Düzenle' : 'Yeni Ürün') . ' | Yönetim Paneli',
            'product' => $product,
            'categories' => (new CategoryModel())->orderBy('sort_order', 'ASC')->findAll(),
        ];
    }

    private function findProduct(int $id): array
    {
        $product = $this->products->find($id);

        if ($product === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $product;
    }

    private function validatedData(?array $existing = null): ?array
    {
        $rules = [
            'category_id' => 'required|is_natural_no_zero',
            'title' => 'required|max_length[190]',
            'sort_order' => 'permit_empty|is_natural',
            'seo_title' => 'permit_empty|max_length[190]',
            'seo_description' => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return null;
        }

        $title = trim((string) $this->request->getPost('title'));
        $slug = trim((string) $this->request->getPost('slug')) ?: $this->slugify($title);
        $slug = $this->uniqueSlug($this->slugify($slug), $existing['id'] ?? null);
        $data = [
            'category_id' => (int) $this->request->getPost('category_id'),
            'title' => $title,
            'slug' => $slug,
            'summary' => trim((string) $this->request->getPost('summary')) ?: null,
            'description' => trim((string) $this->request->getPost('description')) ?: null,
            'seo_title' => trim((string) $this->request->getPost('seo_title')) ?: null,
            'seo_description' => trim((string) $this->request->getPost('seo_description')) ?: null,
            'sort_order' => (int) ($this->request->getPost('sort_order') ?: 0),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $image = $this->request->getFile('image');
        if ($image !== null && $image->isValid() && ! $image->hasMoved()) {
            $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
            if (! in_array($image->getMimeType(), $allowedMimes, true) || $image->getSizeByUnit('mb') > 4) {
                $this->validator->setError('image', 'Görsel JPG, PNG veya WebP formatında ve en fazla 4 MB olmalıdır.');
                return null;
            }

            $directory = FCPATH . 'uploads/products';
            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $fileName = $image->getRandomName();
            $image->move($directory, $fileName);
            $data['image_path'] = 'uploads/products/' . $fileName;
        }

        return $data;
    }

    private function uniqueSlug(string $slug, ?int $ignoreId): string
    {
        $candidate = $slug ?: 'urun';
        $suffix = 2;

        while (true) {
            $query = $this->products->where('slug', $candidate);
            if ($ignoreId !== null) {
                $query->where('id !=', $ignoreId);
            }
            if ($query->first() === null) {
                return $candidate;
            }
            $candidate = $slug . '-' . $suffix++;
        }
    }

    private function slugify(string $value): string
    {
        $value = strtr($value, ['ı' => 'i', 'İ' => 'i', 'ş' => 's', 'Ş' => 's', 'ğ' => 'g', 'Ğ' => 'g', 'ü' => 'u', 'Ü' => 'u', 'ö' => 'o', 'Ö' => 'o', 'ç' => 'c', 'Ç' => 'c']);
        $value = strtolower($value);

        return trim((string) preg_replace('/[^a-z0-9]+/', '-', $value), '-');
    }
}
