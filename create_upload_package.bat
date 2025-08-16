@echo off
echo Laravel projesini InfinityFree için hazırlıyor...

:: Geçici upload klasörü oluştur
if exist "infinityfree_upload" rmdir /s /q "infinityfree_upload"
mkdir infinityfree_upload

:: Gerekli klasörleri kopyala
echo Dosyalar kopyalanıyor...
xcopy /E /I /H /Y "app" "infinityfree_upload\app"
xcopy /E /I /H /Y "bootstrap" "infinityfree_upload\bootstrap"
xcopy /E /I /H /Y "config" "infinityfree_upload\config"
xcopy /E /I /H /Y "database" "infinityfree_upload\database"
xcopy /E /I /H /Y "public" "infinityfree_upload\public"
xcopy /E /I /H /Y "resources" "infinityfree_upload\resources"
xcopy /E /I /H /Y "routes" "infinityfree_upload\routes"
xcopy /E /I /H /Y "storage" "infinityfree_upload\storage"

:: Ana dosyaları kopyala
copy ".env.infinityfree" "infinityfree_upload\.env"
copy ".htaccess" "infinityfree_upload\.htaccess"
copy "artisan" "infinityfree_upload\artisan"
copy "composer.json" "infinityfree_upload\composer.json"
copy "composer.lock" "infinityfree_upload\composer.lock"

echo Hazırlık tamamlandı!
echo infinityfree_upload klasörünü zip'leyip InfinityFree'ye yükleyin.
pause