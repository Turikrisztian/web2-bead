# 7. Telepítés (lokális)

Előfeltételek: PHP 8.2, Composer, Node 20+, SQLite driver.

Lépések PowerShell-ben:
```powershell
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
npm ci
npm run dev
php artisan serve
```

Windows-specifikus megjegyzések:
- Ha `npm run dev` PowerShell policy hiba: `Set-ExecutionPolicy -Scope CurrentUser RemoteSigned`.
- SQLite driver: php.ini-ben `extension=pdo_sqlite` + `extension=sqlite3`.

Alternatív: MySQL lokálisan
```powershell
# .env módosítás
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=beadando
DB_USERNAME=root
DB_PASSWORD=secret
php artisan migrate --seed
```

Build production assetek:
```powershell
npm run build
```
