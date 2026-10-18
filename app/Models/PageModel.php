<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $allowedFields = ['title', 'slug', 'excerpt', 'content', 'seo_title', 'seo_description', 'is_active'];
    protected $useTimestamps = true;
}
