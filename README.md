# Zade Petrokimya

CodeIgniter 4 ile geliştirilen kurumsal katalog ve yönetim paneli projesi.

## İçerik

- Ziyaretçi sitesi: ana sayfa, ürün grupları, ürün detayları, kurumsal sayfalar ve iletişim
- Yönetim paneli: ürün ekleme/düzenleme/silme, ürün görseli yükleme, açıklama/SEO alanları ve ana menü yönetimi
- Başlangıç verisi: mevcut siteden alınan üç ürün grubu, 45 ürün grubu ve 57 menü öğesi

## Yerelde çalıştırma

```bash
cp env .env
```

Yerel SQLite kullanmak için `.env` dosyasına aşağıdakileri ekleyin:

```ini
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'
database.default.database = database.sqlite
database.default.DBDriver = SQLite3
database.default.foreignKeys = true
```

Ardından veritabanını ve başlangıç içeriğini yükleyin:

```bash
touch writable/database.sqlite
php spark migrate --all
php spark db:seed DatabaseSeeder
php spark admin:create
php spark serve
```

`admin:create` komutu, yönetim paneli hesabını sizden interaktif olarak alır. Panel adresi: `/yonetim/giris`.

Üretimde SQLite yerine MySQL kullanılacaksa `.env` içindeki `database.default.*` değerleri sunucudaki MySQL bilgileriyle değiştirilmelidir.
