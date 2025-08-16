<?php
/**
 * InfinityFree Deployment Script
 * Bu dosyayı sunucuda çalıştırarak Laravel'i production moduna geçirin
 */

echo "Laravel InfinityFree Deployment Başlıyor...\n";

// 1. Cache temizle
echo "Cache temizleniyor...\n";
exec('php artisan cache:clear');
exec('php artisan config:clear');
exec('php artisan route:clear');
exec('php artisan view:clear');

// 2. Production cache oluştur
echo "Production cache oluşturuluyor...\n";
exec('php artisan config:cache');
exec('php artisan route:cache');
exec('php artisan view:cache');

// 3. Storage link oluştur
echo "Storage link oluşturuluyor...\n";
exec('php artisan storage:link');

// 4. Veritabanı migration
echo "Veritabanı migration çalıştırılıyor...\n";
exec('php artisan migrate --force');

echo "Deployment tamamlandı!\n";
?>