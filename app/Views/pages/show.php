<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="page-hero page-hero--compact"><div class="container"><p class="eyebrow">KURUMSAL</p><h1><?= esc($page['title']) ?></h1><p><?= esc($page['excerpt']) ?></p></div></section><article class="container content-page"><div class="rich-text"><?= nl2br(esc($page['content'])) ?></div></article>
<?= $this->endSection() ?>
