# 12. Hibakeresés

Gyakori hibák:
- `could not find driver` – engedélyezd a pdo_sqlite / pdo_mysql kiterjesztést
- 404 mindenre – Apache mod_rewrite + .htaccess engedélyezése
- Üres CSS/JS – `npm run build`, `public/build` feltöltése

Logok: `storage/logs/laravel.log`

További hibák:
- 500 belépéskor: hiányzó migráció -> futtasd `php artisan migrate`.
- Nem frissülnek assetek: fut a régi `npm run dev` folyamat – állítsd le és indítsd újra.
- Jogosultság hiba Linux konténerben: `chown -R www-data:www-data storage bootstrap/cache`.

Debug tippek:
```powershell
php artisan tinker
DB::listen(fn($q) => dump($q->sql));
```
