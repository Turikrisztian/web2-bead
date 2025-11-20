@echo off
cd /d "%~dp0"
if not exist artisan exit /b 1
if not exist .env copy .env.example .env >nul
start "Laravel" cmd /k "php artisan serve"
ping 127.0.0.1 -n 3 >nul
start "Vite" cmd /k "npm run dev"
exit /b 0