<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<?php
$docs = [
    ['dmr-tescil-belgesi', 'DMR Zade marka tescil belgesi'],
    ['elam-belgesi', 'ELAM marka tescil belgesi'],
    ['erdemis-belgesi', 'Erdemiş marka tescil belgesi'],
];
?>
<section class="page-hero"><div class="container"><p class="eyebrow">BELGELER</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0">Kalite belgelerimiz ve marka tescillerimiz.</p></div></section>
<section class="py-5"><div class="container"><div class="row g-4 justify-content-center">
    <?php foreach ($docs as [$file, $label]): ?>
    <div class="col-sm-6 col-lg-4"><a class="doc-card" href="<?= base_url('assets/img/belgeler/' . $file . '.jpg') ?>" target="_blank" rel="noopener"><img src="<?= base_url('assets/img/belgeler/' . $file . '-kucuk.jpg') ?>" alt="<?= esc($label) ?>" loading="lazy" width="400" height="615"><span><?= esc($label) ?> · Büyüt ↗</span></a></div>
    <?php endforeach; ?>
</div></div></section>
<?= $this->endSection() ?>
