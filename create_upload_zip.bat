@echo off
echo Laravel projesini zip'leniyor...

:: Gereksiz dosyaları hariç tutarak zip oluştur
powershell -command "& { Add-Type -A 'System.IO.Compression.FileSystem'; $exclude = @('node_modules', '.git', 'vendor', 'storage/logs', 'storage/framework/cache', 'storage/framework/sessions', 'storage/framework/views'); Get-ChildItem -Path '.' -Recurse | Where-Object { $exclude -notcontains $_.Name -and $_.FullName -notlike '*\.git\*' -and $_.FullName -notlike '*\node_modules\*' -and $_.FullName -notlike '*\vendor\*' } | Compress-Archive -DestinationPath 'laravel_upload.zip' -Force }"

echo Zip dosyası oluşturuldu: laravel_upload.zip
echo Bu dosyayı InfinityFree File Manager'a yükleyip Extract edin.
pause