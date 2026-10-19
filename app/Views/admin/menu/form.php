<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<?php
$isEdit = $item !== null;
$errors = session('errors') ?? [];
$err = static fn (string $k): string => isset($errors[$k]) ? '<div class="text-danger small mt-1">' . esc($errors[$k]) . '</div>' : '';
?>
<a class="btn btn-link px-0 mb-3" href="<?= site_url('yonetim/menu') ?>"><i class="fas fa-arrow-left mr-1"></i>Menüye dön</a>
<form method="post" action="<?= $isEdit ? site_url('yonetim/menu/' . $item['id']) : site_url('yonetim/menu') ?>">
<?= csrf_field() ?>
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary"><?= $isEdit ? 'Menü öğesini düzenle' : 'Yeni menü öğesi' ?></h6></div><div class="card-body"><div class="form-row">
    <div class="form-group col-md-8"><label>Başlık</label><input class="form-control" name="label" value="<?= esc(old('label', $item['label'] ?? '')) ?>" required><?= $err('label') ?></div>
    <div class="form-group col-md-4"><label>Sıra</label><input class="form-control" type="number" name="sort_order" min="0" value="<?= esc(old('sort_order', $item['sort_order'] ?? 0)) ?>"></div>
    <div class="form-group col-md-6"><label>Üst menü</label><select class="form-control" name="parent_id"><option value="">Ana seviye</option><?php foreach ($parents as $parent): ?><option value="<?= $parent['id'] ?>" <?= (string) old('parent_id', $item['parent_id'] ?? '') === (string) $parent['id'] ? 'selected' : '' ?>><?= esc($parent['label']) ?></option><?php endforeach; ?></select></div>
    <div class="form-group col-md-6"><label>Hedef</label><select class="form-control" name="target"><option value="_self" <?= old('target', $item['target'] ?? '_self') === '_self' ? 'selected' : '' ?>>Aynı sekme</option><option value="_blank" <?= old('target', $item['target'] ?? '') === '_blank' ? 'selected' : '' ?>>Yeni sekme</option></select></div>
    <div class="form-group col-12"><label>Bağlantı</label><input class="form-control" name="url" placeholder="/iletisim veya https://..." value="<?= esc(old('url', $item['url'] ?? '')) ?>" required><?= $err('url') ?></div>
</div>
<div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="is_active" name="is_active" value="1" <?= old('is_active', $item['is_active'] ?? 1) ? 'checked' : '' ?>><label class="custom-control-label" for="is_active">Menüde yayınla</label></div>
</div></div>
<button class="btn btn-primary" type="submit"><?= $isEdit ? 'Değişiklikleri kaydet' : 'Menü öğesini ekle' ?></button>
</form>
<?= $this->endSection() ?>
