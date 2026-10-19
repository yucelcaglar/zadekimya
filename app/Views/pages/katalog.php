<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="page-hero"><div class="container"><p class="eyebrow">KATALOG</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0">Ürün gruplarımızı inceleyin, ayrıntılı bilgi ve teklif için bize ulaşın.</p></div></section>
<section class="py-5"><div class="container">
    <div class="row g-4"><?php foreach ($categories as $category): ?>
        <div class="col-md-4"><a class="card category-card h-100 text-decoration-none" href="<?= site_url('urunler/' . $category['slug']) ?>"><?php if ($category['image_path']): ?><div class="category-card__img"><img src="<?= base_url(esc($category['image_path'])) ?>" alt="<?= esc($category['name']) ?>" loading="lazy"></div><?php endif; ?><div class="card-body p-4 d-flex flex-column"><h2 class="h4 fw-bold"><?= esc($category['name']) ?></h2><p class="text-muted"><?= esc($category['description'] ?: 'Ürün gruplarını inceleyin.') ?></p><span class="mt-auto link-accent fw-semibold">Ürünleri gör →</span></div></a></div>
    <?php endforeach; ?></div>
    <div class="cta-box mt-5"><div><h2 class="h4 fw-bold mb-1">Basılı katalog veya teknik föy mü gerekiyor?</h2><p class="mb-0">Talebinizi iletin, ekibimiz size ulaşsın.</p></div><a class="btn btn-brand btn-lg px-4" href="<?= site_url('iletisim') ?>">Katalog Talep Et</a></div>
</div></section>
<?= $this->endSection() ?>
