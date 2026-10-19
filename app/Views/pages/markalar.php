<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<?php
$img = static fn (string $f): string => base_url('assets/img/markalar/' . $f . '.png');
$oil = ['petrol-ofisi' => 'Petrol Ofisi', 'total' => 'Total', 'shell' => 'Shell', 'mobil' => 'Mobil', 'opet-fuchs' => 'Opet Fuchs', 'lukoil' => 'Lukoil', 'belgin' => 'Belgin', 'quaker-houghton' => 'Quaker Houghton', 'rasch' => 'Rasch', 'coldex' => 'Coldex', 'skor-oil' => 'Skor Oil', 'eurolub' => 'Eurolub'];
$filter = ['mevag-filtre' => 'Mevag Filtre', 'filtron' => 'Filtron', 'man-filter' => 'MAN Filter', 'fil-filtre' => 'Fil Filtre', 'donaldson' => 'Donaldson', 'sampiyon-filtre' => 'Şampiyon Filtre'];
?>
<section class="page-hero"><div class="container"><p class="eyebrow">MARKALAR</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0">Çözüm ortaklarımız ve çalıştığımız markalar.</p></div></section>
<section class="py-5"><div class="container">
    <h2 class="h4 fw-bold mb-4">Yağ Markaları</h2>
    <div class="row g-3 mb-5"><?php foreach ($oil as $file => $name): ?><div class="col-6 col-md-4 col-lg-2"><div class="brand-tile"><img src="<?= $img($file) ?>" alt="<?= esc($name) ?>" loading="lazy" width="160" height="160"></div></div><?php endforeach; ?></div>
    <h2 class="h4 fw-bold mb-4">Filtre Markaları</h2>
    <div class="row g-3"><?php foreach ($filter as $file => $name): ?><div class="col-6 col-md-4 col-lg-2"><div class="brand-tile"><img src="<?= $img($file) ?>" alt="<?= esc($name) ?>" loading="lazy" width="160" height="160"></div></div><?php endforeach; ?></div>
</div></section>
<?= $this->endSection() ?>
