<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<?php
$isEdit = $product !== null;
$errors = session('errors') ?? [];
$err = static fn (string $k): string => isset($errors[$k]) ? '<div class="text-danger small mt-1">' . esc($errors[$k]) . '</div>' : '';
?>
<a class="btn btn-link px-0 mb-3" href="<?= site_url('yonetim/urunler') ?>"><i class="fas fa-arrow-left mr-1"></i>Ürünlere dön</a>
<form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('yonetim/urunler/' . $product['id']) : site_url('yonetim/urunler') ?>">
<?= csrf_field() ?>
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary"><?= $isEdit ? 'Ürünü düzenle' : 'Yeni ürün ekle' ?></h6></div><div class="card-body"><div class="form-row">
    <div class="form-group col-md-8"><label>Kategori</label><select class="form-control" name="category_id" required><option value="">Seçin</option><?php foreach ($categories as $category): ?><option value="<?= $category['id'] ?>" <?= (string) old('category_id', $product['category_id'] ?? '') === (string) $category['id'] ? 'selected' : '' ?>><?= esc($category['name']) ?></option><?php endforeach; ?></select><?= $err('category_id') ?></div>
    <div class="form-group col-md-4"><label>Sıra</label><input class="form-control" type="number" name="sort_order" min="0" value="<?= esc(old('sort_order', $product['sort_order'] ?? 0)) ?>"></div>
    <div class="form-group col-12"><label>Ürün adı</label><input class="form-control" name="title" value="<?= esc(old('title', $product['title'] ?? '')) ?>" required><?= $err('title') ?></div>
    <div class="form-group col-12"><label>URL kısa adı <small class="text-muted">(boş bırakılırsa otomatik oluşur)</small></label><input class="form-control" name="slug" value="<?= esc(old('slug', $product['slug'] ?? '')) ?>"></div>
    <div class="form-group col-12"><label>Kısa açıklama</label><textarea class="form-control" name="summary" rows="3"><?= esc(old('summary', $product['summary'] ?? '')) ?></textarea></div>
    <div class="form-group col-12"><label>Açıklama</label><textarea class="form-control" name="description" rows="8"><?= esc(old('description', $product['description'] ?? '')) ?></textarea></div>
    <div class="form-group col-12"><label>Ürün görseli <small class="text-muted">JPG, PNG veya WebP · en fazla 4 MB</small></label><input class="form-control-file" type="file" name="image" accept="image/jpeg,image/png,image/webp"><?php if ($isEdit && $product['image_path']): ?><div class="mt-2"><img class="form-image img-thumbnail" src="<?= base_url(esc($product['image_path'])) ?>" alt="Mevcut görsel"><div class="custom-control custom-checkbox mt-2"><input class="custom-control-input" type="checkbox" id="remove_image" name="remove_image" value="1"><label class="custom-control-label text-danger" for="remove_image"><i class="fas fa-trash mr-1"></i>Mevcut görseli kaldır</label></div><small class="text-muted">Yeni bir görsel seçerseniz mevcut görselin yerine geçer.</small></div><?php endif; ?><?= $err('image') ?></div>
    <div class="form-group col-md-6"><label>SEO başlık</label><input class="form-control" name="seo_title" value="<?= esc(old('seo_title', $product['seo_title'] ?? '')) ?>"></div>
    <div class="form-group col-md-6"><label>SEO açıklama</label><input class="form-control" name="seo_description" value="<?= esc(old('seo_description', $product['seo_description'] ?? '')) ?>"></div>
</div>
<div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="is_featured" name="is_featured" value="1" <?= old('is_featured', $product['is_featured'] ?? 0) ? 'checked' : '' ?>><label class="custom-control-label" for="is_featured">Ana sayfada öne çıkar</label></div>
<div class="custom-control custom-checkbox mt-2"><input class="custom-control-input" type="checkbox" id="is_active" name="is_active" value="1" <?= old('is_active', $product['is_active'] ?? 1) ? 'checked' : '' ?>><label class="custom-control-label" for="is_active">Yayında</label></div>
</div></div>
<button class="btn btn-primary" type="submit"><?= $isEdit ? 'Değişiklikleri kaydet' : 'Ürünü ekle' ?></button>
</form>
<?= $this->endSection() ?>
