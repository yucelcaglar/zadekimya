<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $allowedFields = [
        'category_id', 'title', 'slug', 'summary', 'description', 'image_path',
        'seo_title', 'seo_description', 'sort_order', 'is_featured', 'is_active',
    ];
    protected $useTimestamps = true;
}
