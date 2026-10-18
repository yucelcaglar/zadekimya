<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<section class="admin-stat-grid"><article><span>Toplam ürün</span><strong><?= esc($productCount) ?></strong><a href="<?= site_url('yonetim/urunler') ?>">Ürünleri yönet →</a></article><article><span>Menü öğesi</span><strong><?= esc($menuItemCount) ?></strong><a href="<?= site_url('yonetim/menu') ?>">Menüyü yönet →</a></article></section><section class="admin-card"><h2>Başlangıç tamamlandı</h2><p>Mevcut sitedeki ürün grupları ve ana menü başlangıç verisi olarak yüklendi. Buradan ürün açıklamalarını, görsellerini ve site menüsünü güncelleyebilirsiniz.</p></section>
<?= $this->endSection() ?>
