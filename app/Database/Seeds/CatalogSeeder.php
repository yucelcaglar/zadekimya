<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use App\Models\MenuItemModel;
use App\Models\MenuModel;
use App\Models\PageModel;
use App\Models\ProductModel;
use CodeIgniter\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run()
    {
        $categories = new CategoryModel();
        $products = new ProductModel();
        $pages = new PageModel();
        $menus = new MenuModel();
        $menuItems = new MenuItemModel();

        $categoryData = [
            ['name' => 'Filtreler', 'slug' => 'filtreler', 'sort_order' => 10],
            ['name' => 'Madeni Yağlar', 'slug' => 'madeni-yaglar', 'sort_order' => 20],
            ['name' => 'Gres Yağları', 'slug' => 'gres-yaglari', 'sort_order' => 30],
        ];

        $categoryIds = [];
        foreach ($categoryData as $category) {
            $existing = $categories->where('slug', $category['slug'])->first();
            $categoryIds[$category['slug']] = $existing['id'] ?? $categories->insert($category, true);
        }

        $catalog = [
            'filtreler' => [
                ['Disk Filtresi', 'Tek, iki veya üç katlı farklı mikron tellerle; daire, elips, kare, dikdörtgen ve özel şekillerde üretilebilen endüstriyel disk filtrelerdir. 304 ve 316 kalite paslanmaz çelik seçenekleriyle farklı ölçülerde hazırlanabilir.'],
                ['Gemi Motoru Boll Filtre', null],
                ['Hava Filtresi', null],
                ['Hidrolik Filtre (BD06080425U)', null],
                ['Su Filtresi', null],
                ['Torba Filtre', null],
                ['Toz Boya Filtreleri', null],
                ['Plastik Enjeksiyon - Hidrolik Filtreleri', null],
                ['Kompresör Filtresi', null],
                ['Gıda Fabrika Filtreleri', null],
                ['İlaç Fabrika Filtreleri', null],
                ['Kartuş Filtresi', null],
                ['Panel Tipi Kaset', null],
                ['CNC - Taşlama Filtresi', null],
                ['Kurutucu Filtre', null],
                ['Teflon / PTFE Kartuş Filtreler', null],
                ['Tel Erezyon Filtresi', null],
            ],
            'madeni-yaglar' => [
                ['Mineral Bor Yağı', 'Mineral yağ bazlı, demir ve demir dışı malzemelerin genel amaçlı işlenmesinde kullanıma uygun üniversal bor yağlarıdır.'],
                ['Koruyucu ve Korozyon Önleyici Yağlar', null],
                ['Yarı Sentetik Metal İşleme Sıvıları', null],
                ['Sıvama / Derin Çekme Yağları', null],
                ['Metal Enjeksiyon Yağları', null],
                ['Plastik ve Kauçuk Sanayi Ayırıcı Yağlar', null],
                ['Saf Kesme Yağları', null],
                ['Elektro Erozyon Sıvıları', null],
                ['Hidrolik Sistem Yağları', null],
                ['Kızak Yağları', null],
                ['Sanayi Dişli Yağları', null],
                ['Motor Yağları', null],
                ['Kompresör Yağları', null],
                ['Proses Yağları', null],
                ['Tekstil Yağları', null],
                ['Kalıp Ayırıcı Yağlar', null],
                ['Gıda Uyumlu Özel Yağlar', null],
                ['Muhtelif Özel Endüstriyel Yağları', null],
            ],
            'gres-yaglari' => [
                ['Lityum Sabunlu Gresler', 'Lityum sabunlu gresler; pas, ısı ve yük taşıma direnci yüksek, düşük ve yüksek sıcaklıklarda kullanılabilen çok amaçlı yağlayıcılardır. Rulman ve şasi yağlamasında yaygın olarak kullanılır.'],
                ['Kalsiyum Sabunlu Gresler', null],
                ['Kırmızı Gres', null],
                ['Kauçuklu Gres', null],
                ['Gıda Uyumlu Özel Gresler', null],
                ['Grafitli Gresler', null],
                ['Halat ve Zincir Gresleri', null],
                ['Gresler ve Pastalar', null],
                ['Yüksek Sıcaklık Gresleri', null],
                ['Sprey Gresler', null],
            ],
        ];

        $productUrls = [];
        foreach ($catalog as $categorySlug => $items) {
            foreach ($items as $index => [$title, $description]) {
                $slug = $this->slugify($title);
                $existing = $products->where('slug', $slug)->first();

                if ($existing === null) {
                    $products->insert([
                        'category_id' => $categoryIds[$categorySlug],
                        'title' => $title,
                        'slug' => $slug,
                        'summary' => $description,
                        'description' => $description,
                        'sort_order' => ($index + 1) * 10,
                        'is_featured' => $index < 3 ? 1 : 0,
                        'is_active' => 1,
                    ]);
                }

                $productUrls[$categorySlug][] = ['label' => $title, 'url' => '/urun/' . $slug];
            }
        }

        $pageData = [
            [
                'title' => 'Hakkımızda',
                'slug' => 'hakkimizda',
                'excerpt' => 'Zade Petrokimya, endüstriyel filtre ve yağ çözümleri sunar.',
                'content' => "2004 yılında endüstriyel filtre, madeni yağlar ve endüstriyel yağ ticareti ile başlayan yolculuğumuz; mesleki tecrübemiz ve gelişen teknoloji ışığında endüstriyel filtre imalatı ile devam etmektedir.\n\nMüşteri memnuniyetini her zaman ön planda tutuyor; yüksek kalite, uygun fiyat, hızlı teslimat ve çözüm odaklı hizmet ilkeleriyle çalışıyoruz.",
            ],
            [
                'title' => 'Prensiplerimiz',
                'slug' => 'prensiplerimiz',
                'excerpt' => 'Kalite, güvenilirlik ve sürdürülebilir çözüm anlayışımız.',
                'content' => 'Müşteri odaklılık, kaliteli üretim, şeffaf iletişim ve sürekli gelişim çalışma ilkelerimizin temelini oluşturur.',
            ],
            [
                'title' => 'Kalite Politikamız',
                'slug' => 'kalite-politikamiz',
                'excerpt' => 'Ürün ve hizmet kalitesini sürekli geliştirmeyi hedefliyoruz.',
                'content' => 'Müşterilerimizin ihtiyaçlarına uygun, güvenilir ve sürdürülebilir ürünler sunmak için süreçlerimizi sürekli iyileştiririz.',
            ],
            [
                'title' => 'Markalar',
                'slug' => 'markalar',
                'excerpt' => 'Çözüm ortaklarımız ve markalarımız.',
                'content' => 'Marka içerikleri yönetim panelinden eklenerek burada yayınlanacaktır.',
            ],
            [
                'title' => 'Katalog',
                'slug' => 'katalog',
                'excerpt' => 'Ürün kataloğumuz.',
                'content' => 'Güncel ürün kataloğu bu alanda yayınlanacaktır.',
            ],
            [
                'title' => 'Belgeler',
                'slug' => 'belgeler',
                'excerpt' => 'Kalite belgeleri ve dokümanlar.',
                'content' => 'Belge ve sertifikalar bu alanda yayınlanacaktır.',
            ],
        ];

        foreach ($pageData as $page) {
            if ($pages->where('slug', $page['slug'])->first() === null) {
                $pages->insert($page);
            }
        }

        $mainMenu = $menus->where('code', 'main')->first();
        $mainMenuId = $mainMenu['id'] ?? $menus->insert([
            'name' => 'Ana Menü',
            'code' => 'main',
            'location' => 'header',
        ], true);

        if ($menuItems->where('menu_id', $mainMenuId)->countAllResults() === 0) {
            $homeId = $menuItems->insert(['menu_id' => $mainMenuId, 'label' => 'Ana Sayfa', 'url' => '/', 'sort_order' => 10], true);
            $corporateId = $menuItems->insert(['menu_id' => $mainMenuId, 'label' => 'Kurumsal', 'url' => '#', 'sort_order' => 20], true);
            $corporateItems = [
                ['Hakkımızda', '/sayfa/hakkimizda'],
                ['Prensiplerimiz', '/sayfa/prensiplerimiz'],
                ['Kalite Politikamız', '/sayfa/kalite-politikamiz'],
            ];
            foreach ($corporateItems as $index => [$label, $url]) {
                $menuItems->insert(['menu_id' => $mainMenuId, 'parent_id' => $corporateId, 'label' => $label, 'url' => $url, 'sort_order' => ($index + 1) * 10]);
            }

            $categoryPositions = ['filtreler' => 30, 'madeni-yaglar' => 40, 'gres-yaglari' => 50];
            foreach ($categoryPositions as $slug => $position) {
                $category = $categories->where('slug', $slug)->first();
                $categoryItemId = $menuItems->insert([
                    'menu_id' => $mainMenuId,
                    'label' => $category['name'],
                    'url' => '/urunler/' . $slug,
                    'sort_order' => $position,
                ], true);

                foreach ($productUrls[$slug] as $index => $product) {
                    $menuItems->insert([
                        'menu_id' => $mainMenuId,
                        'parent_id' => $categoryItemId,
                        'label' => $product['label'],
                        'url' => $product['url'],
                        'sort_order' => ($index + 1) * 10,
                    ]);
                }
            }

            foreach ([
                ['Markalar', '/sayfa/markalar'],
                ['Katalog', '/sayfa/katalog'],
                ['Belgeler', '/sayfa/belgeler'],
                ['İletişim', '/iletisim'],
            ] as $index => [$label, $url]) {
                $menuItems->insert(['menu_id' => $mainMenuId, 'label' => $label, 'url' => $url, 'sort_order' => 60 + ($index * 10)]);
            }
        }
    }

    private function slugify(string $value): string
    {
        $value = strtr($value, ['ı' => 'i', 'İ' => 'i', 'ş' => 's', 'Ş' => 's', 'ğ' => 'g', 'Ğ' => 'g', 'ü' => 'u', 'Ü' => 'u', 'ö' => 'o', 'Ö' => 'o', 'ç' => 'c', 'Ç' => 'c']);
        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? '';

        return trim($value, '-');
    }
}
