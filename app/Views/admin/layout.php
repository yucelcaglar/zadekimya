<?php $path = trim(service('request')->getUri()->getPath(), '/'); $active = static fn (string $p): string => str_contains($path, $p) ? ' active' : ''; ?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title><?= esc($title ?? 'Yönetim Paneli') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/lib/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/lib/sb-admin-2/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('yonetim') ?>">
            <div class="sidebar-brand-icon"><i class="fas fa-oil-can"></i></div>
            <div class="sidebar-brand-text mx-3">ZADE <sup>Yönetim</sup></div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item<?= $path === 'yonetim' ? ' active' : '' ?>"><a class="nav-link" href="<?= site_url('yonetim') ?>"><i class="fas fa-fw fa-tachometer-alt"></i><span>Genel Bakış</span></a></li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">İçerik</div>
        <li class="nav-item<?= $active('yonetim/urunler') ?>"><a class="nav-link" href="<?= site_url('yonetim/urunler') ?>"><i class="fas fa-fw fa-boxes"></i><span>Ürünler</span></a></li>
        <li class="nav-item<?= $active('yonetim/menu') ?>"><a class="nav-link" href="<?= site_url('yonetim/menu') ?>"><i class="fas fa-fw fa-bars"></i><span>Site Menüsü</span></a></li>
        <li class="nav-item<?= $active('yonetim/mesajlar') ?>"><a class="nav-link" href="<?= site_url('yonetim/mesajlar') ?>"><i class="fas fa-fw fa-envelope"></i><span>Mesajlar</span></a></li>
        <hr class="sidebar-divider">
        <li class="nav-item"><a class="nav-link" href="<?= site_url() ?>" target="_blank" rel="noopener"><i class="fas fa-fw fa-external-link-alt"></i><span>Siteyi Görüntüle</span></a></li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline"><button class="rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button"><i class="fa fa-bars"></i></button>
                <h1 class="h5 mb-0 text-gray-800 font-weight-bold"><?= esc($title ?? '') ?></h1>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-flex align-items-center"><span class="mr-3 d-none d-lg-inline text-gray-600 small"><i class="fas fa-user-circle mr-1"></i><?= esc((string) session('admin_user_name')) ?></span></li>
                    <li class="nav-item d-flex align-items-center"><form action="<?= site_url('yonetim/cikis') ?>" method="post"><?= csrf_field() ?><button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fas fa-sign-out-alt mr-1"></i>Çıkış Yap</button></form></li>
                </ul>
            </nav>
            <div class="container-fluid">
                <?php if (session('success')): ?><div class="alert alert-success" role="alert"><?= esc((string) session('success')) ?></div><?php endif; ?>
                <?php if (session('error')): ?><div class="alert alert-danger" role="alert"><?= esc((string) session('error')) ?></div><?php endif; ?>
                <?= $this->renderSection('content') ?>
            </div>
        </div>
        <footer class="sticky-footer bg-white"><div class="container my-auto"><div class="copyright text-center my-auto"><span>© <?= date('Y') ?> Zade Petrokimya</span></div></div></footer>
    </div>
</div>
<script src="<?= base_url('assets/lib/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/bootstrap4/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/sb-admin-2/sb-admin-2.min.js') ?>"></script>
</body>
</html>
