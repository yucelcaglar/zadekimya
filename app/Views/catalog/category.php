<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="page-hero"><div class="container"><p class="eyebrow text-brand">ÜRÜN GRUBU</p><h1 class="fw-bold"><?= esc($category['name']) ?></h1><p class="lead mb-0"><?= esc($category['description'] ?: 'Endüstriyel ihtiyaçlara uygun ürün gruplarımızı inceleyin.') ?></p></div></section>
<section class="py-5"><div class="container">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= site_url() ?>">Ana Sayfa</a></li><li class="breadcrumb-item active" aria-current="page"><?= esc($category['name']) ?></li></ol></nav>
    <div class="row g-4"><?php foreach ($products as $product): ?>
        <div class="col-sm-6 col-lg-4"><a class="card product-card h-100 text-decoration-none" href="<?= site_url('urun/' . $product['slug']) ?>"><div class="product-card__visual"><?php if ($product['image_path']): ?><img src="<?= base_url(esc($product['image_path'])) ?>" alt="<?= esc($product['title']) ?>"><?php else: ?><span><?= esc(mb_substr($category['name'], 0, 1)) ?></span><?php endif; ?></div><div class="card-body"><small class="text-muted text-uppercase"><?= esc($category['name']) ?></small><h2 class="h5 fw-bold mt-1"><?= esc($product['title']) ?></h2><span class="link-accent small fw-semibold">Detayları incele →</span></div></a></div>
    <?php endforeach; ?></div>
</div></section>
<?= $this->endSection() ?>
