<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuItemModel;
use App\Models\MenuModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MenuController extends BaseController
{
    private MenuItemModel $items;
    private array $menu;

    public function __construct()
    {
        $this->items = new MenuItemModel();
        $this->menu = (new MenuModel())->where('code', 'main')->first() ?? [];
    }

    public function index(): string
    {
        return view('admin/menu/index', [
            'title' => 'Menü Yönetimi | Yönetim Paneli',
            'items' => $this->itemsWithParents(),
        ]);
    }

    public function create(): string
    {
        return view('admin/menu/form', $this->formData());
    }

    public function store()
    {
        $data = $this->validatedData();
        if ($data === null) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->items->insert($data);

        return redirect()->to(site_url('yonetim/menu'))->with('success', 'Menü öğesi eklendi.');
    }

    public function edit(int $id): string
    {
        return view('admin/menu/form', $this->formData($this->findItem($id)));
    }

    public function update(int $id)
    {
        $item = $this->findItem($id);
        $data = $this->validatedData($item);
        if ($data === null) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->items->update($id, $data);

        return redirect()->to(site_url('yonetim/menu'))->with('success', 'Menü öğesi güncellendi.');
    }

    public function delete(int $id)
    {
        $this->findItem($id);
        $this->items->delete($id);

        return redirect()->to(site_url('yonetim/menu'))->with('success', 'Menü öğesi kaldırıldı.');
    }

    private function formData(?array $item = null): array
    {
        $parents = $this->items->where('menu_id', $this->menu['id'] ?? 0)->orderBy('sort_order', 'ASC')->findAll();
        if ($item !== null) {
            $parents = array_values(array_filter($parents, fn (array $parent): bool => (int) $parent['id'] !== (int) $item['id']));
        }

        return [
            'title' => ($item ? 'Menü Öğesini Düzenle' : 'Yeni Menü Öğesi') . ' | Yönetim Paneli',
            'item' => $item,
            'parents' => $parents,
        ];
    }

    private function itemsWithParents(): array
    {
        return $this->items
            ->select('menu_items.*, parent.label as parent_label')
            ->join('menu_items as parent', 'parent.id = menu_items.parent_id', 'left')
            ->where('menu_items.menu_id', $this->menu['id'] ?? 0)
            ->orderBy('menu_items.parent_id', 'ASC')
            ->orderBy('menu_items.sort_order', 'ASC')
            ->findAll();
    }

    private function findItem(int $id): array
    {
        $item = $this->items->where('menu_id', $this->menu['id'] ?? 0)->find($id);
        if ($item === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $item;
    }

    private function validatedData(?array $current = null): ?array
    {
        if (! $this->validate([
            'label' => 'required|max_length[120]',
            'url' => 'required|max_length[255]',
            'sort_order' => 'permit_empty|is_natural',
        ])) {
            return null;
        }

        $parentId = $this->request->getPost('parent_id');
        if ($parentId !== null && $parentId !== '' && (int) $parentId === (int) ($current['id'] ?? 0)) {
            $this->validator->setError('parent_id', 'Bir menü öğesi kendisinin altına taşınamaz.');
            return null;
        }

        return [
            'menu_id' => $this->menu['id'],
            'parent_id' => $parentId !== null && $parentId !== '' ? (int) $parentId : null,
            'label' => trim((string) $this->request->getPost('label')),
            'url' => trim((string) $this->request->getPost('url')),
            'target' => $this->request->getPost('target') === '_blank' ? '_blank' : '_self',
            'sort_order' => (int) ($this->request->getPost('sort_order') ?: 0),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];
    }
}
