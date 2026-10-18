<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menus';
    protected $allowedFields = ['name', 'code', 'location'];
    protected $useTimestamps = true;
}
