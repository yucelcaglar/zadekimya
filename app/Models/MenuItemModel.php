<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model
{
    protected $table = 'menu_items';
    protected $allowedFields = ['menu_id', 'parent_id', 'label', 'url', 'target', 'sort_order', 'is_active'];
    protected $useTimestamps = true;
}
