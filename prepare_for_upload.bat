@echo off
echo Laravel projesini FTP yüklemesi için hazırlıyor...

:: Geçici upload klasörü oluştur
if exist "upload_temp" rmdir /s /q "upload_temp"
mkdir upload_temp

:: Gerekli dosyaları kopyala (gereksizleri hariç tut)
echo Dosyalar kopyalanıyor...
xcopy /E /I /H /Y "app" "upload_temp\app"
xcopy /E /I /H /Y "bootstrap" "upload_temp\bootstrap"
xcopy /E /I /H /Y "config" "upload_temp\config"
xcopy /E /I /H /Y "database" "upload_temp\database"
xcopy /E /I /H /Y "public" "upload_temp\public"
xcopy /E /I /H /Y "resources" "upload_temp\resources"
xcopy /E /I /H /Y "routes" "upload_temp\routes"
xcopy /E /I /H /Y "storage" "upload_temp\storage"

:: Ana dosyaları kopyala
copy ".env.production" "upload_temp\.env"
copy ".htaccess" "upload_temp\.htaccess"
copy "artisan" "upload_temp\artisan"
copy "composer.json" "upload_temp\composer.json"
copy "composer.lock" "upload_temp\composer.lock"
copy "deploy.php" "upload_temp\deploy.php"

echo Hazırlık tamamlandı!
echo upload_temp klasörünü FileZilla ile htdocs'a yükleyin.
pause