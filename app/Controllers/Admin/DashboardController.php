<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuItemModel;
use App\Models\ProductModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        return view('admin/dashboard', [
            'title' => 'Yönetim Paneli | Zade Petrokimya',
            'productCount' => (new ProductModel())->countAllResults(),
            'menuItemCount' => (new MenuItemModel())->countAllResults(),
        ]);
    }
}
