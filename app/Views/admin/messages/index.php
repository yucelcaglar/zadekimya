<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<p class="text-gray-600">İletişim formundan gelen mesajlar. En yeni mesaj en üstte.</p>
<?php if ($messages === []): ?>
    <div class="card shadow mb-4"><div class="card-body text-center text-muted py-5">Henüz mesaj yok.</div></div>
<?php endif; ?>
<?php foreach ($messages as $m): ?>
<div class="card shadow mb-3 <?= $m['is_read'] ? '' : 'border-left-primary' ?>"><div class="card-body">
    <div class="d-flex flex-wrap justify-content-between">
        <div><strong><?= esc($m['first_name'] . ' ' . $m['last_name']) ?></strong> <?= $m['is_read'] ? '' : '<span class="badge badge-primary">Yeni</span>' ?><br><small class="text-muted"><a href="mailto:<?= esc($m['email']) ?>"><?= esc($m['email']) ?></a><?= $m['phone'] ? ' · <a href="tel:' . esc($m['phone']) . '">' . esc($m['phone']) . '</a>' : '' ?> · <?= esc($m['created_at']) ?></small></div>
        <div class="text-nowrap">
            <?php if (! $m['is_read']): ?><form class="d-inline" method="post" action="<?= site_url('yonetim/mesajlar/' . $m['id'] . '/okundu') ?>"><?= csrf_field() ?><button class="btn btn-sm btn-outline-primary" type="submit"><i class="fas fa-check"></i> Okundu</button></form><?php endif; ?>
            <form class="d-inline" method="post" action="<?= site_url('yonetim/mesajlar/' . $m['id'] . '/sil') ?>" onsubmit="return confirm('Bu mesajı silmek istediğinize emin misiniz?')"><?= csrf_field() ?><button class="btn btn-sm btn-outline-danger" type="submit"><i class="fas fa-trash"></i> Sil</button></form>
        </div>
    </div>
    <?php if ($m['subject']): ?><h6 class="mt-3 mb-1 font-weight-bold"><?= esc($m['subject']) ?></h6><?php endif; ?>
    <p class="mb-0 mt-2"><?= nl2br(esc($m['message'])) ?></p>
</div></div>
<?php endforeach; ?>
<?= $this->endSection() ?>
