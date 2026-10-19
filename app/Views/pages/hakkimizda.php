<?= $this->extend('layouts/site') ?>
<?= $this->section('content') ?>
<section class="page-hero"><div class="container"><p class="eyebrow">KURUMSAL</p><h1 class="fw-bold"><?= esc($page['title']) ?></h1><p class="lead mb-0">2004'ten bugüne endüstriyel filtre ve yağlama çözümleri.</p></div></section>
<section class="py-5"><div class="container"><div class="row g-5">
    <div class="col-lg-3"><?= $this->include('pages/_kurumsal_menu') ?></div>
    <article class="col-lg-9 rich-text">
        <p class="lead">2004 yılında endüstriyel filtre, madeni yağlar ve endüstriyel yağ ticaretiyle başlayan iş hayatımız; mesleki tecrübemiz ve gelişen teknoloji ışığında endüstriyel filtre imalatıyla devam ediyor.</p>
        <p>Zade Petrokimya Hırdavat Endüstriyel Filtre San. Tic. A.Ş. çatısı altında, <strong>ERDEMİŞ FİLTRE</strong> markasıyla hizmet veriyoruz.</p>
        <div class="row g-3 my-4">
            <div class="col-sm-6 col-lg-3"><div class="fact"><strong>2004</strong><span>Kuruluş yılı</span></div></div>
            <div class="col-sm-6 col-lg-3"><div class="fact"><strong>Kaliteli</strong><span>Uygun fiyatla</span></div></div>
            <div class="col-sm-6 col-lg-3"><div class="fact"><strong>Sınırsız</strong><span>Kapasite</span></div></div>
            <div class="col-sm-6 col-lg-3"><div class="fact"><strong>Hızlı</strong><span>Teslimat</span></div></div>
        </div>
        <h2 class="h4 fw-bold mt-5">Yaklaşımımız</h2>
        <p>Müşteri memnuniyetini her zaman ön planda tutuyor, yüksek kaliteyi uygun fiyatla sunmayı; sınırsız kapasite ve hızlı teslimatla müşterilerimizin üretimini aksatmamayı ilke ediniyoruz.</p>
        <h2 class="h4 fw-bold mt-5">Ürün yelpazemiz</h2>
        <p>Hava, yağ, hidrolik, yakıt, su, HEPA, kartuş, torba, disk, kompresör ve gıda sanayi filtreleri başta olmak üzere geniş bir filtre yelpazesi sunuyoruz. İhtiyacınıza özel filtreleri de talep üzerine üretiyoruz.</p>
        <p><a class="btn btn-brand" href="<?= site_url('urunler/filtreler') ?>">Filtrelerimizi inceleyin</a></p>
        <h2 class="h4 fw-bold mt-5">Kalite ve çevre</h2>
        <p>İnsan sağlığını doğrudan etkileyen endüstriyel yağların ve filtrelerin kalitesini yükseltmek için çalışıyor, çevreye karşı sorumluluğumuzun bilincinde hareket ediyoruz.</p>
        <p class="mb-0">Bize güvenen müşterilerimize, çözüm ortaklarımıza ve iş ortaklarımıza teşekkür ederiz.</p>
    </article>
</div></div></section>
<?= $this->endSection() ?>
