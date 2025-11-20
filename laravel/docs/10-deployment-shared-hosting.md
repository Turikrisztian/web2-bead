# 10. Deploy – megosztott tárhely

1) PHP 8.2 és kiterjesztések: fileinfo, pdo_mysql (vagy sqlite)
2) Document Root → projekt `public/`
3) `.env` (prod) beállítás, MySQL adatok
4) SSH esetén: `composer install --no-dev`, `npm ci && npm run build`, `php artisan migrate --force`, cache parancsok
5) SSH nélkül: lokálisan buildelni, feltölteni `vendor` és `public/build` mappákat is

Részletek:
- Timeout beállítás (ha nagyobb artisan parancs fut): hosting panel PHP ini.
- Ütemezett feladatok (cron): pl. `* * * * * php /path/artisan schedule:run` (jövőbeli bővítéshez).
- Jogosultságok: `storage/` és `bootstrap/cache` írható (755 vagy 775 hosttól függően).

Fontos `.env` értékek prodon:
```
APP_ENV=production
APP_DEBUG=false
LOG_CHANNEL=stack
SESSION_DRIVER=file (vagy redis)
```

Cache optimalizálás:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
