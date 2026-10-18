<!doctype html>
<html lang="tr">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?= esc($title ?? 'Yönetim Paneli') ?></title><link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>"></head>
<body class="admin-body"><aside class="admin-sidebar"><a class="admin-brand" href="<?= site_url('yonetim') ?>"><span>Z</span><strong>ZADE<br><small>YÖNETİM</small></strong></a><nav><a href="<?= site_url('yonetim') ?>">Genel Bakış</a><a href="<?= site_url('yonetim/urunler') ?>">Ürünler</a><a href="<?= site_url('yonetim/menu') ?>">Site Menüsü</a><a href="<?= site_url() ?>" target="_blank">Siteyi Görüntüle ↗</a></nav><form action="<?= site_url('yonetim/cikis') ?>" method="post"><?= csrf_field() ?><button type="submit">Çıkış Yap</button></form></aside>
<main class="admin-main"><header class="admin-header"><div><p>Yönetim Paneli</p><h1><?= esc($title ?? '') ?></h1></div><span><?= esc((string) session('admin_user_name')) ?></span></header>
<?php if (session('success')): ?><div class="notice notice--success"><?= esc((string) session('success')) ?></div><?php endif; ?><?php if (session('error')): ?><div class="notice notice--error"><?= esc((string) session('error')) ?></div><?php endif; ?>
<?= $this->renderSection('content') ?></main></body></html>
