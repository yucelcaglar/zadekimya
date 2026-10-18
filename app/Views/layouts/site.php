<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc($description ?? 'Endüstriyel filtre, madeni yağ ve gres çözümleri.') ?>">
    <title><?= esc($title ?? 'Zade Petrokimya') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/site.css') ?>">
</head>
<body>
    <div class="announcement"><div class="container announcement__inner"><span><i></i> Endüstriyel filtreleme ve yağlama çözümleri</span><a href="mailto:info@zadekimya.com">info@zadekimya.com</a></div></div>
    <header class="site-header"><div class="container header__inner">
        <a class="brand" href="<?= site_url() ?>" aria-label="Zade Petrokimya ana sayfa"><span class="brand__mark"><b></b><b></b><b></b><b></b></span><span><strong>ZADE</strong><small>PETROKİMYA</small></span></a>
        <nav class="main-nav" aria-label="Ana menü">
            <?php foreach (main_menu() as $item): ?>
                <?php if ($item['children'] !== []): ?>
                    <details class="nav-dropdown"><summary><?= esc($item['label']) ?></summary><div class="nav-dropdown__panel"><a class="nav-dropdown__all" href="<?= esc(menu_link($item['url'])) ?>">Tüm <?= esc($item['label']) ?> <span>→</span></a><?php foreach ($item['children'] as $child): ?><a href="<?= esc(menu_link($child['url'])) ?>" target="<?= esc($child['target']) ?>"><?= esc($child['label']) ?></a><?php endforeach; ?></div></details>
                <?php else: ?>
                    <a href="<?= esc(menu_link($item['url'])) ?>" target="<?= esc($item['target']) ?>"><?= esc($item['label']) ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
        <div class="header-tools"><a class="header-phone" href="tel:+902626580202"><span>Satış &amp; destek</span>+90 262 658 02 02</a><a class="header-cta" href="<?= site_url('iletisim') ?>"><span>Teklif alın</span> <b>↗</b></a></div>
    </div></header>
    <main><?= $this->renderSection('content') ?></main>
    <footer class="site-footer"><div class="container footer-top"><div><a class="brand brand--light" href="<?= site_url() ?>"><span class="brand__mark"><b></b><b></b><b></b><b></b></span><span><strong>ZADE</strong><small>PETROKİMYA</small></span></a><p>Endüstriyel filtrasyon ve yağlama süreçlerinde güvenilir çözüm ortağınız.</p></div><a class="footer-talk" href="<?= site_url('iletisim') ?>">Projenizi konuşalım <span>↗</span></a></div><div class="container footer-grid">
        <div><h2>Merkez</h2><address>Şekerpınar Mahallesi Anadolu Caddesi<br>Melis Sokak No: 3-3A<br>41420 Çayırova, Kocaeli</address></div>
        <div><h2>İletişim</h2><a href="tel:+902626580202">+90 262 658 02 02</a><a href="tel:+905053120537">+90 505 312 05 37</a><a href="mailto:info@zadekimya.com">info@zadekimya.com</a></div>
        <div><h2>Katalog</h2><a href="<?= site_url('urunler/filtreler') ?>">Endüstriyel filtreler</a><a href="<?= site_url('urunler/madeni-yaglar') ?>">Madeni yağlar</a><a href="<?= site_url('urunler/gres-yaglari') ?>">Gres yağları</a></div>
    </div><div class="container footer-bottom"><span>© <?= date('Y') ?> Zade Petrokimya</span><span>Kalite · Güven · Süreklilik</span></div></footer>
</body>
</html>
