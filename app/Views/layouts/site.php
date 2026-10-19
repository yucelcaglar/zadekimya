<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc($description ?? 'Endüstriyel filtre, madeni yağ ve gres çözümleri.') ?>">
    <title><?= esc($title ?? 'Zade Petrokimya') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/lib/bootstrap5/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/site.css') ?>">
</head>
<body>
    <?php
    $menu = main_menu();
    $isCategory = static fn (array $i): bool => $i['children'] !== [] || str_starts_with((string) $i['url'], '/urunler');
    $topLinks = array_filter($menu, static fn (array $i): bool => ! $isCategory($i));
    $categoryLinks = array_filter($menu, $isCategory);
    ?>
    <div class="topbar"><div class="container d-flex justify-content-between align-items-center py-2 small">
        <a href="#icerik" class="skip-link">İçeriğe geç</a>
        <nav class="topbar__links d-none d-lg-flex" aria-label="Üst menü"><?php foreach ($topLinks as $item): ?><a href="<?= esc(menu_link($item['url'])) ?>" target="<?= esc($item['target']) ?>"><?= esc($item['label']) ?></a><?php endforeach; ?></nav>
        <span class="topbar__phones ms-auto"><a class="topbar__wa" href="https://wa.me/905053120537" target="_blank" rel="noopener">WhatsApp +90 505 312 05 37</a><a class="topbar__tel" href="tel:+902626580202">☎ +90 262 658 02 02</a></span>
    </div></div>
    <header class="site-header">
        <div class="container d-flex align-items-center justify-content-between py-3 gap-3">
            <a class="brand" href="<?= site_url() ?>" aria-label="Zade Petrokimya ana sayfa"><img src="<?= base_url('assets/img/logo.png') ?>" alt="Zade Petrokimya" width="256" height="65"></a>
            <div class="d-none d-md-flex gap-2"><a class="btn btn-outline-navy" href="<?= site_url('iletisim') ?>">✉ Talep Oluştur</a><a class="btn btn-brand" href="tel:+902626580202">Hemen Bilgi Al ↗</a></div>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Menüyü aç"><span class="navbar-toggler-icon"></span></button>
        </div>
        <nav class="navbar navbar-expand-lg nav-bar p-0" aria-label="Ana menü"><div class="container">
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto">
                    <?php foreach ($categoryLinks as $item): ?>
                        <?php if ($item['children'] !== []): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= esc($item['label']) ?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item fw-semibold" href="<?= esc(menu_link($item['url'])) ?>">Tüm <?= esc($item['label']) ?> →</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <?php foreach ($item['children'] as $child): ?>
                                        <li><a class="dropdown-item" href="<?= esc(menu_link($child['url'])) ?>" target="<?= esc($child['target']) ?>"><?= esc($child['label']) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="<?= esc(menu_link($item['url'])) ?>" target="<?= esc($item['target']) ?>"><?= esc($item['label']) ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach ($topLinks as $item): ?><li class="nav-item d-lg-none"><a class="nav-link" href="<?= esc(menu_link($item['url'])) ?>"><?= esc($item['label']) ?></a></li><?php endforeach; ?>
                </ul>
            </div>
        </div></nav>
    </header>
    <main id="icerik"><?= $this->renderSection('content') ?></main>
    <footer class="site-footer">
        <div class="container py-5"><div class="row g-4">
            <div class="col-lg-4"><a class="brand brand--light d-inline-block mb-3" href="<?= site_url() ?>"><img src="<?= base_url('assets/img/logo.png') ?>" alt="Zade Petrokimya" width="220" height="56"></a><p class="mb-0">Endüstriyel filtrasyon ve yağlama süreçlerinde güvenilir çözüm ortağınız.</p></div>
            <div class="col-sm-6 col-lg-3"><h2>Merkez</h2><address>Şekerpınar Mahallesi Anadolu Caddesi<br>Melis Sokak No: 3-3A<br>41420 Çayırova, Kocaeli</address></div>
            <div class="col-sm-6 col-lg-2"><h2>İletişim</h2><a href="tel:+902626580202">+90 262 658 02 02</a><a href="tel:+905053120537">+90 505 312 05 37</a><a href="mailto:info@zadekimya.com">info@zadekimya.com</a></div>
            <div class="col-lg-3"><h2>Katalog</h2><a href="<?= site_url('urunler/filtreler') ?>">Endüstriyel filtreler</a><a href="<?= site_url('urunler/madeni-yaglar') ?>">Madeni yağlar</a><a href="<?= site_url('urunler/gres-yaglari') ?>">Gres yağları</a></div>
        </div></div>
        <div class="footer-bottom"><div class="container d-flex flex-wrap justify-content-between py-3 small"><span>© <?= date('Y') ?> Zade Petrokimya</span><span>Kalite · Güven · Süreklilik</span></div></div>
    </footer>
    <a class="float-wa" href="https://wa.me/905053120537" target="_blank" rel="noopener" aria-label="WhatsApp ile yazın"><svg viewBox="0 0 32 32" width="28" height="28" fill="#fff" aria-hidden="true"><path d="M5 4h22a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H13l-7 6v-6H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg></a>
    <script src="<?= base_url('assets/lib/bootstrap5/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
