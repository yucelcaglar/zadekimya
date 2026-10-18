<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();
        $categories = $categoryModel->active();

        foreach ($categories as &$category) {
            $category['product_count'] = $productModel
                ->where('category_id', $category['id'])
                ->where('is_active', 1)
                ->countAllResults();
        }
        unset($category);

        $featured = $productModel
            ->select('products.*, product_categories.name as category_name, product_categories.slug as category_slug')
            ->join('product_categories', 'product_categories.id = products.category_id')
            ->where('products.is_active', 1)
            ->where('products.is_featured', 1)
            ->orderBy('products.sort_order', 'ASC')
            ->findAll(6);

        return view('home/index', [
            'title' => 'Zade Petrokimya | Endüstriyel Yağ ve Filtre',
            'categories' => $categories,
            'featured' => $featured,
        ]);
    }
}
