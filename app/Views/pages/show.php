<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="page-hero"><div class="container"><p class="eyebrow text-brand">KURUMSAL</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0"><?= esc($page['excerpt']) ?></p></div></section>
<article class="container py-5"><div class="rich-text col-lg-9"><?= nl2br(esc($page['content'])) ?></div></article>
<?= $this->endSection() ?>
