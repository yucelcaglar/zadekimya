<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<?php
$principles = [
    'Müşterilerimizi şirket ortağı gibi görürüz.',
    'Müşterilerimizin siparişlerini tam zamanında teslim etmeye azami gayret gösteririz.',
    'Müşterilerimizin üretimlerini aksatmamak için her zaman yeterli miktarda stok bulundururuz.',
    'Her gün daha iyi olma azmi ve gayreti içinde yenilikleri ve gelişmeleri takip eder; tecrübelerimizi müşterilerimizle paylaşırız.',
    'İtibarın paradan daha değerli olduğuna inanır, söz ve teyitlerimizi herhangi bir aksaklığa meydan vermeksizin zamanında yerine getiririz.',
    'Vatana, topluma, insanlığa ve doğal çevreye yararlı olmak için son derece çaba gösteririz.',
];
?>
<section class="page-hero"><div class="container"><p class="eyebrow">KURUMSAL</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0">Çalışma biçimimizi belirleyen ilkeler.</p></div></section>
<section class="py-5"><div class="container"><div class="row g-5">
    <div class="col-lg-3"><?= $this->include('pages/_kurumsal_menu') ?></div>
    <div class="col-lg-9"><div class="row g-4"><?php foreach ($principles as $i => $text): ?>
        <div class="col-md-6"><div class="principle"><b><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></b><p class="mb-0"><?= esc($text) ?></p></div></div>
    <?php endforeach; ?></div></div>
</div></div></section>
<?= $this->endSection() ?>
