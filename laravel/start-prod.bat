@echo off
cd /d "%~dp0"
if not exist artisan exit /b 1
if not exist .env copy .env.production.example .env >nul
REM Generate key if empty
for /f "tokens=*" %%A in ('findstr /b /c:"APP_KEY=" .env') do set LINE=%%A
if "%LINE%"=="APP_KEY=" (
  php artisan key:generate >nul
)
REM Install dependencies (assumes already installed on shared hosting without Node build)
if exist package.json (
  echo Node build skipped (already built assets expected in public/build)
)
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
echo Production prep complete.
exit /b 0