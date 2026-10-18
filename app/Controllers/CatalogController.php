<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class CatalogController extends BaseController
{
    public function category(string $slug): string
    {
        $category = (new CategoryModel())->where('slug', $slug)->where('is_active', 1)->first();

        if ($category === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $products = (new ProductModel())
            ->where('category_id', $category['id'])
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return view('catalog/category', [
            'title' => $category['name'] . ' | Zade Petrokimya',
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function show(string $slug): string
    {
        $product = (new ProductModel())
            ->select('products.*, product_categories.name as category_name, product_categories.slug as category_slug')
            ->join('product_categories', 'product_categories.id = products.category_id')
            ->where('products.slug', $slug)
            ->where('products.is_active', 1)
            ->first();

        if ($product === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('catalog/show', [
            'title' => ($product['seo_title'] ?: $product['title']) . ' | Zade Petrokimya',
            'description' => $product['seo_description'] ?: $product['summary'],
            'product' => $product,
        ]);
    }
}
