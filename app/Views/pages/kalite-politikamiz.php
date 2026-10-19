<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="page-hero"><div class="container"><p class="eyebrow">KURUMSAL</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0">Ürün ve hizmet kalitesine bakışımız.</p></div></section>
<section class="py-5"><div class="container"><div class="row g-5">
    <div class="col-lg-3"><?= $this->include('pages/_kurumsal_menu') ?></div>
    <article class="col-lg-9 rich-text">
        <div class="principle mb-4"><b>01</b><p class="mb-0">Alım ve satımını yaptığımız her ürün, uzman personelimiz tarafından kontrol edilir ve sevkiyat sırasında yeniden denetlenir.</p></div>
        <div class="principle mb-4"><b>02</b><p class="mb-0">Müşterilerimize en iyi fiyatı verebilmek ve isteklerinin zamanında karşılanması için büyük özen gösteriyoruz.</p></div>
        <div class="principle mb-4"><b>03</b><p class="mb-0">Tecrübeli ve genç kadromuzla en iyi fiyat ve hizmeti sunmayı; müşteri taleplerini hızlı ve kaliteli biçimde karşılamayı çalışma politikamızın temeli olarak görüyoruz.</p></div>
        <div class="principle"><b>04</b><p class="mb-0">Ticaretini yaptığımız ürünlerin kalitesinin arkasındayız; üretim sürecinde ortaya çıkabilecek sorunların sorumluluğunu üstleniriz.</p></div>
    </article>
</div></div></section>
<?= $this->endSection() ?>
