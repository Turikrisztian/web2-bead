# Gyors Deployment Útmutató (Production)

## Előkészület lokálisan
1. PHP 8.2/8.3, Composer, Node 20.
2. Másold `.env.production.example` -> `.env` és töltsd ki: `APP_KEY` (futtasd: `php artisan key:generate`), MySQL adatok.
3. Telepítés & build:
```powershell
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force --seed
```
4. Ellenőrizd létrejött-e: `public/build/manifest.json` és a `assets/app-*.css`, `assets/app-*.js` fájlok.

## Fájlok feltöltése tárhelyre (Nethely / cPanel)
- Document Root mutasson a projekt `public` mappájára.
- Töltsd fel a teljes projektet: különösen `vendor/`, `public/build/`, `.env`.
- Jogosultságok: `storage/`, `bootstrap/cache/` írható (755 vagy 775).

## Laravel optimalizálás (SSH esetén)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

## Asset betöltés
Productionban a `resources/views/layouts/app.blade.php` a `public/build/manifest.json` fájlt olvassa és közvetlenül hivatkozza a hashed CSS/JS fájlokat. Nem használja a Vite dev szervert, így nincs 5174-es hiba.

Ha nincs stílus:
1. Nyisd meg a CSS URL-t közvetlenül: `https://domen.hu/build/assets/app-XXXX.css`.
2. Ha 404: hiányzik a `public/build` mappa vagy Document Root nem a `public`.
3. Ha betölt, de nincs Tailwind kinézet: töröld a böngésző cache-t / privát ablak.

## Frissítés új verzióra
1. Lokálisan futtasd újra: `npm run build`.
2. Másold fel csak a módosult PHP fájlokat + `public/build` és szükség esetén új `vendor` (ha Composer frissült).
3. SSH esetén: `composer install --no-dev --optimize-autoloader && php artisan migrate --force`.

## Hibakeresés röviden
| Jelenség | Ok | Megoldás |
|----------|----|----------|
| 500 hiba első betöltéskor | Hiányzó `APP_KEY` | `php artisan key:generate` + újra feltöltés csak `.env` |
| Stílus nincs | Hiányzó build vagy rossz root | Ellenőrizd `public/build/manifest.json` + Document Root |
| Dev szerver kérések :5174 | Régi `@vite` direktíva VAGY `public/hot` | Töröld a `public/hot` fájlt + ürítsd a view cache-t (`php artisan view:clear`) |
| 404 minden route | Apache rewrite tiltva | Engedélyezd `.htaccess` a `public/` alatt |
| DB kapcsolat hiba | Rossz host/user/pass | Javítsd `.env` + `php artisan config:clear` |

## Gyors parancsok
```powershell
php artisan view:clear
php artisan config:clear
php artisan cache:clear
```

## Ops (ideiglenes) endpointok SSH nélkül
Állíts be egy egyszeri kulcsot a `.env` fájlban:

```
CACHE_FLUSH_KEY=valami-egyszeri-titok
```

Hívható URL-ek:
- Cache ürítés: `https://<domen>/__ops/flush?key=valami-egyszeri-titok`
- Asset diagnosztika (manifest, fájlok): `https://<domen>/__ops/assets`

Siker után töröld vagy üresítsd a `CACHE_FLUSH_KEY`-t, vagy távolítsd el a route-okat.

### Kézi takarítás, ha nincs SSH
- Töröld a szerveren a következőket File Managerrel:
	- `public/hot`
	- `storage/framework/views/` mappa összes fájlja (hagyd meg a `.gitignore`-t)
- Frissítsd az oldalt privát ablakban.

## start-prod (kézi lépések)
Windows batch script létrehozva: `start-prod.bat` amely lefuttatja build + artisan optimize (külön szerver futtatás nélkül). SSH hoston nem szükséges.

---
Ez az útmutató a README tömörített production részét egészíti ki.
