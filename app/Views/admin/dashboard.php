<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-primary shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam ürün</div><div class="h4 mb-0 font-weight-bold text-gray-800"><?= esc($productCount) ?></div><a class="small" href="<?= site_url('yonetim/urunler') ?>">Ürünleri yönet →</a></div><div class="col-auto"><i class="fas fa-boxes fa-2x text-gray-300"></i></div></div></div></div></div>
    <div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-success shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Menü öğesi</div><div class="h4 mb-0 font-weight-bold text-gray-800"><?= esc($menuItemCount) ?></div><a class="small" href="<?= site_url('yonetim/menu') ?>">Menüyü yönet →</a></div><div class="col-auto"><i class="fas fa-bars fa-2x text-gray-300"></i></div></div></div></div></div>
</div>
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Başlangıç tamamlandı</h6></div><div class="card-body">Mevcut sitedeki ürün grupları ve ana menü başlangıç verisi olarak yüklendi. Buradan ürün açıklamalarını, görsellerini ve site menüsünü güncelleyebilirsiniz.</div></div>
<?= $this->endSection() ?>
