<?php
/**
 * GitHub'dan direkt çekme scripti
 * Bu dosyayı InfinityFree'ye yükleyip çalıştırın
 */

$repo_url = "https://github.com/yourusername/mertaygroup-laravel/archive/refs/heads/main.zip";
$zip_file = "project.zip";

echo "GitHub'dan proje indiriliyor...\n";

// Zip dosyasını indir
file_put_contents($zip_file, file_get_contents($repo_url));

// Zip'i çıkar
$zip = new ZipArchive;
if ($zip->open($zip_file) === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo "Proje başarıyla çıkarıldı!\n";
    
    // Zip dosyasını sil
    unlink($zip_file);
    
    echo "Composer install çalıştırılıyor...\n";
    exec('composer install --no-dev --optimize-autoloader');
    
    echo "Deployment tamamlandı!\n";
} else {
    echo "Zip çıkarma hatası!\n";
}
?>