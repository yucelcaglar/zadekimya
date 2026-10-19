<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="py-5"><div class="container"><div class="row g-5">
    <div class="col-lg-5"><div class="product-detail__image"><?php if ($product['image_path']): ?><img src="<?= base_url(esc($product['image_path'])) ?>" alt="<?= esc($product['title']) ?>"><?php else: ?><span><?= esc(mb_substr($product['category_name'], 0, 1)) ?></span><?php endif; ?></div></div>
    <article class="col-lg-7">
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= site_url() ?>">Ana Sayfa</a></li><li class="breadcrumb-item"><a href="<?= site_url('urunler/' . $product['category_slug']) ?>"><?= esc($product['category_name']) ?></a></li></ol></nav>
        <p class="eyebrow"><?= esc($product['category_name']) ?></p>
        <h1 class="fw-bold mb-4"><?= esc($product['title']) ?></h1>
        <?php if ($product['description']): ?><div class="rich-text"><?= nl2br(esc($product['description'])) ?></div><?php else: ?><p class="text-muted">Bu ürün grubunun teknik özellikleri ve kullanım alanları için bizimle iletişime geçebilirsiniz.</p><?php endif; ?>
        <a class="btn btn-brand btn-lg px-4 mt-3" href="<?= site_url('iletisim') ?>">Teklif ve Bilgi Alın</a>
    </article>
</div></div></section>
<?= $this->endSection() ?>
