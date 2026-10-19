<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<?php
$errors = session('errors') ?? [];
$err = static fn (string $k): string => isset($errors[$k]) ? '<div class="invalid-feedback d-block">' . esc($errors[$k]) . '</div>' : '';
?>
<section class="page-hero"><div class="container"><p class="eyebrow">İLETİŞİM</p><h1 class="fw-bold">Size yardımcı olmaktan memnuniyet duyarız.</h1><p class="lead mb-0">Ürünlerimiz, teknik ihtiyaçlarınız ve teklif talepleriniz için bizimle iletişime geçin.</p></div></section>
<section class="py-5"><div class="container">
    <div class="row g-4 mb-5">
        <div class="col-md-4"><div class="contact-box"><p class="eyebrow">ADRES</p><h2 class="h5 fw-bold">Zade Petrokimya</h2><address class="mb-0">Şekerpınar Mahallesi Anadolu Caddesi<br>Melis Sokak No: 3-3A<br>41420 Çayırova, Kocaeli</address></div></div>
        <div class="col-md-4"><div class="contact-box"><p class="eyebrow">TELEFON</p><h2 class="h5 fw-bold mb-1"><a href="tel:+902626580202">+90 262 658 02 02</a></h2><p class="mb-0">GSM / WhatsApp: <a href="tel:+905053120537">+90 505 312 05 37</a></p></div></div>
        <div class="col-md-4"><div class="contact-box"><p class="eyebrow">E-POSTA</p><h2 class="h5 fw-bold mb-0"><a href="mailto:info@zadekimya.com">info@zadekimya.com</a></h2></div></div>
    </div>
    <div class="row g-5">
        <div class="col-lg-6" id="iletisim-formu">
            <h2 class="h4 fw-bold mb-3">Hemen talep oluşturun</h2>
            <?php if (session('success')): ?><div class="alert alert-success" role="alert"><?= esc((string) session('success')) ?></div><?php endif; ?>
            <form method="post" action="<?= site_url('iletisim') ?>" class="row g-3" novalidate>
                <?= csrf_field() ?>
                <div class="d-none" aria-hidden="true"><label>Web sitesi<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                <div class="col-md-6"><label class="form-label" for="first_name">Adınız</label><input class="form-control" id="first_name" name="first_name" value="<?= esc(old('first_name')) ?>" required autocomplete="given-name"><?= $err('first_name') ?></div>
                <div class="col-md-6"><label class="form-label" for="last_name">Soyadınız</label><input class="form-control" id="last_name" name="last_name" value="<?= esc(old('last_name')) ?>" required autocomplete="family-name"><?= $err('last_name') ?></div>
                <div class="col-md-6"><label class="form-label" for="email">E-Mail</label><input class="form-control" type="email" id="email" name="email" value="<?= esc(old('email')) ?>" required autocomplete="email"><?= $err('email') ?></div>
                <div class="col-md-6"><label class="form-label" for="phone">Telefon</label><input class="form-control" type="tel" id="phone" name="phone" value="<?= esc(old('phone')) ?>" autocomplete="tel"><?= $err('phone') ?></div>
                <div class="col-12"><label class="form-label" for="subject">Konu</label><input class="form-control" id="subject" name="subject" value="<?= esc(old('subject')) ?>"><?= $err('subject') ?></div>
                <div class="col-12"><label class="form-label" for="message">Mesajınız</label><textarea class="form-control" id="message" name="message" rows="6" required><?= esc(old('message')) ?></textarea><?= $err('message') ?></div>
                <div class="col-12"><button class="btn btn-brand btn-lg px-5" type="submit">Gönder</button></div>
            </form>
        </div>
        <div class="col-lg-6 d-flex flex-column">
            <h2 class="h4 fw-bold mb-3">Bizi haritada bulun</h2>
            <div class="map-frame flex-grow-1"><iframe title="Zade Petrokimya konumu" src="https://maps.google.com/maps?q=<?= rawurlencode('Şekerpınar Mahallesi Anadolu Caddesi Melis Sokak No 3-3A Çayırova Kocaeli') ?>&amp;hl=tr&amp;z=15&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe></div>
            <a class="link-accent fw-semibold d-inline-block mt-2" href="https://www.google.com/maps/search/?api=1&amp;query=<?= rawurlencode('Şekerpınar Mahallesi Anadolu Caddesi Melis Sokak No 3-3A Çayırova Kocaeli') ?>" target="_blank" rel="noopener">Google Haritalar'da aç ↗</a>
        </div>
    </div>
</div></section>
<?= $this->endSection() ?>
