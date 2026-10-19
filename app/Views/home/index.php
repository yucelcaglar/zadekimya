<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<?php $slides = array_slice($featured, 0, 4); ?>
<section class="hero-slider"><div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner"><?php foreach ($slides as $i => $product): ?>
        <div class="carousel-item<?= $i === 0 ? ' active' : '' ?>"><div class="container hero-slide"><div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge-pill"><b>YENİLİK</b> <?= esc($product['category_name']) ?></span>
                <h1 class="display-4 fw-bold my-4"><?= esc($product['title']) ?></h1>
                <p class="lead mb-4"><?= esc($product['summary'] ?: 'Endüstriyel sistemleriniz için güvenilir filtrasyon ve yağlama çözümü.') ?></p>
                <div class="d-flex flex-wrap gap-2"><a class="btn btn-brand btn-lg px-4" href="<?= site_url('urun/' . $product['slug']) ?>">Hemen İncele →</a><a class="btn btn-soft btn-lg px-4" href="<?= site_url('iletisim') ?>">Hızlı Bilgi Al ☎</a></div>
            </div>
            <div class="col-lg-5 d-none d-lg-block"><div class="hero-slide__visual"><?php if ($product['image_path']): ?><img src="<?= base_url(esc($product['image_path'])) ?>" alt="<?= esc($product['title']) ?>"><?php else: ?><span><?= esc(mb_substr($product['category_name'], 0, 1)) ?></span><?php endif; ?></div></div>
        </div></div></div>
    <?php endforeach; ?></div>
    <?php if (count($slides) > 1): ?><div class="hero-arrows"><button type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Önceki">‹</button><button type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Sonraki">›</button></div><?php endif; ?>
</div></section>

<section class="trust-strip"><div class="container"><div class="row text-center g-0">
    <div class="col-4 py-3"><strong>20+</strong><small>Yıllık deneyim</small></div>
    <div class="col-4 py-3"><strong>45+</strong><small>Ürün grubu</small></div>
    <div class="col-4 py-3"><strong>3</strong><small>Ana çözüm alanı</small></div>
</div></div></section>

<section class="py-5"><div class="container py-lg-3">
    <div class="text-center mb-5"><p class="eyebrow">ÜRÜN GRUPLARI</p><h2 class="fw-bold">Endüstriyel çözüm alanlarımız</h2></div>
    <div class="row g-4"><?php foreach ($categories as $index => $category): ?>
        <div class="col-md-4"><a class="card category-card h-100 text-decoration-none" href="<?= site_url('urunler/' . $category['slug']) ?>"><?php if ($category['image_path']): ?><div class="category-card__img"><img src="<?= base_url(esc($category['image_path'])) ?>" alt="<?= esc($category['name']) ?>" loading="lazy"></div><?php endif; ?><div class="card-body p-4 d-flex flex-column"><span class="category-card__no">0<?= $index + 1 ?></span><h3 class="h4 fw-bold mt-3"><?= esc($category['name']) ?></h3><p class="text-muted"><?= esc($category['product_count']) ?> ürün grubu</p><span class="mt-auto link-accent fw-semibold">İncele →</span></div></a></div>
    <?php endforeach; ?></div>
</div></section>

<section class="cta-band py-5"><div class="container d-flex flex-wrap justify-content-between align-items-center gap-3"><h2 class="h3 fw-bold mb-0">İşletmenize özel çözümler için uzmanımıza danışın.</h2><a class="btn btn-light btn-lg px-4 fw-semibold" href="<?= site_url('iletisim') ?>">Ücretsiz Teknik Destek Al</a></div></section>

<section class="py-5 bg-light"><div class="container py-lg-3">
    <div class="d-flex flex-wrap justify-content-between align-items-end mb-4"><div><p class="eyebrow">ÖNE ÇIKANLAR</p><h2 class="fw-bold mb-0">Doğru ürün, doğru uygulama</h2></div><a class="link-accent fw-semibold" href="<?= site_url('urunler/filtreler') ?>">Tüm ürün grupları →</a></div>
    <div class="row g-4"><?php foreach ($featured as $product): ?>
        <div class="col-sm-6 col-lg-3"><a class="card product-card h-100 text-decoration-none" href="<?= site_url('urun/' . $product['slug']) ?>"><div class="product-card__visual"><?php if ($product['image_path']): ?><img src="<?= base_url(esc($product['image_path'])) ?>" alt="<?= esc($product['title']) ?>"><?php else: ?><span><?= esc(mb_substr($product['category_name'], 0, 1)) ?></span><?php endif; ?></div><div class="card-body"><small class="text-muted text-uppercase"><?= esc($product['category_name']) ?></small><h3 class="h6 fw-bold mt-1"><?= esc($product['title']) ?></h3><span class="link-accent small fw-semibold">Detayları görüntüle →</span></div></a></div>
    <?php endforeach; ?></div>
</div></section>

<section class="py-5"><div class="container py-lg-3"><div class="row g-4">
    <div class="col-md-4"><div class="value-box"><b>01</b><h3 class="h5 fw-bold">Yüksek hassasiyet</h3><p class="text-muted mb-0">Uygulamanıza uygun filtreleme ve yağlama ürününü birlikte belirleriz.</p></div></div>
    <div class="col-md-4"><div class="value-box"><b>02</b><h3 class="h5 fw-bold">Sistem verimliliği</h3><p class="text-muted mb-0">Doğru ürün seçimiyle operasyonunuzun sürekliliğini destekleriz.</p></div></div>
    <div class="col-md-4"><div class="value-box"><b>03</b><h3 class="h5 fw-bold">Teknik destek</h3><p class="text-muted mb-0">Seçimden tedariğe kadar uzman ekibimiz yanınızda.</p></div></div>
</div></div></section>

<section class="py-5 bg-light"><div class="container py-lg-3"><div class="row g-5 align-items-center">
    <div class="col-lg-5"><p class="eyebrow">SIK SORULANLAR</p><h2 class="fw-bold">Merak ettikleriniz</h2><p class="text-muted">Aradığınızı bulamadıysanız bize ulaşın.</p><a class="btn btn-navy" href="<?= site_url('iletisim') ?>">Bize Sorun</a></div>
    <div class="col-lg-7"><div class="accordion" id="faq">
        <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#f1">Doğru filtreyi nasıl seçerim?</button></h3><div id="f1" class="accordion-collapse collapse show" data-bs-parent="#faq"><div class="accordion-body">Makine modelinizi ve kullanım koşullarınızı paylaşın, ekibimiz size uygun ürünü belirlesin.</div></div></div>
        <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f2">Teklif nasıl alabilirim?</button></h3><div id="f2" class="accordion-collapse collapse" data-bs-parent="#faq"><div class="accordion-body">İletişim sayfamızdan, telefonla veya WhatsApp üzerinden talebinizi iletebilirsiniz.</div></div></div>
        <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f3">Hangi ürün gruplarını sunuyorsunuz?</button></h3><div id="f3" class="accordion-collapse collapse" data-bs-parent="#faq"><div class="accordion-body">Endüstriyel filtreler, madeni yağlar ve gres yağları olmak üzere üç ana çözüm alanımız var.</div></div></div>
    </div></div>
</div></div></section>
<?= $this->endSection() ?>
