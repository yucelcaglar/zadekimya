<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'product_categories';
    protected $allowedFields = ['name', 'slug', 'description', 'image_path', 'sort_order', 'is_active'];
    protected $useTimestamps = true;

    public function active(): array
    {
        return $this->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll();
    }
}
