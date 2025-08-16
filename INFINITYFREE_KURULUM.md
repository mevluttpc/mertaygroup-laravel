# InfinityFree Laravel Kurulum Rehberi

## 1. InfinityFree Hesap Ayarları

1. InfinityFree.com'da hesap oluşturun
2. Yeni bir website oluşturun
3. MySQL veritabanı oluşturun (Control Panel > MySQL Databases)
4. Veritabanı bilgilerini not alın:
   - Database Name: if0_xxxxxxx_database_name
   - Username: if0_xxxxxxx_username
   - Password: your_password
   - Host: sql200.infinityfree.com

## 2. Dosya Yükleme

1. Tüm proje dosyalarını htdocs klasörüne yükleyin
2. .env.production dosyasını .env olarak yeniden adlandırın
3. Veritabanı bilgilerini .env dosyasında güncelleyin

## 3. Veritabanı Kurulumu

1. File Manager'dan deploy.php dosyasını çalıştırın:
   https://yourdomain.infinityfreeapp.com/deploy.php

## 4. Önemli Notlar

- InfinityFree'de cron job yoktur, queue:work kullanmayın
- SQLite yerine MySQL kullanın
- Debug modunu kapatın (APP_DEBUG=false)
- HTTPS kullanın (APP_URL=https://...)

## 5. Test

Website'nizi ziyaret edin: https://yourdomain.infinityfreeapp.com

## Sorun Giderme

- 500 hatası alırsanız: storage ve bootstrap/cache klasörlerinin yazma izni olduğundan emin olun
- Veritabanı hatası: .env dosyasındaki DB bilgilerini kontrol edin
- CSS/JS yüklenmiyor: APP_URL'yi doğru ayarlayın