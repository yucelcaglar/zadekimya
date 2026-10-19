<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SetCategoryImages extends Migration
{
    private const IMAGES = [
        'filtreler' => 'assets/img/kategoriler/filtreler.jpg',
        'madeni-yaglar' => 'assets/img/kategoriler/madeni-yaglar.jpg',
        'gres-yaglari' => 'assets/img/kategoriler/gres-yaglari.jpg',
    ];

    public function up()
    {
        foreach (self::IMAGES as $slug => $path) {
            $this->db->table('product_categories')->where('slug', $slug)->where('image_path IS NULL', null, false)->update(['image_path' => $path]);
        }
    }

    public function down()
    {
        foreach (self::IMAGES as $slug => $path) {
            $this->db->table('product_categories')->where('slug', $slug)->where('image_path', $path)->update(['image_path' => null]);
        }
    }
}
