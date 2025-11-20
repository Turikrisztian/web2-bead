## Beadandó webalkalmazás (Laravel 12 + Breeze)

Funkciók: autentikáció (role: admin/user), kezdőlap, kapcsolat űrlap (Message mentés), üzenetek listázása, Products CRUD, Diagram (kategória szerinti termékszám), Admin dashboard, reszponzív Tailwind UI.

### Külső Pizza dataset integráció
Az alkalmazás egy külső (pizza shop témájú) adatkészlettel egészül ki a `PizzaSeeder` által.

Beépítés helye:
- `database/seeders/DatabaseSeeder.php` hívja: `$this->call(PizzaSeeder::class);`
- `database/seeders/PizzaSeeder.php` létrehozza a kategóriákat ("Pizza Alapok", "Húsos", "Vegetáriánus", "Extra Sajtos") és hozzájuk a pizzákat (`products` táblában), majd pár mintarendelést (`orders`) generál egy meglévő userhez.

Ismételt futtatás védelem: ha már létezik a "Pizza Alapok" kategória vagy >15 kategória van, a seeder kilép, így nem duplikál.

Gyors ellenőrzés Tinkerben:
```bash
php artisan tinker
Category::pluck('name');
Product::where('name', 'Pepperoni')->first();
Order::with('product')->latest()->take(3)->get();
```

Ha törölni akarod és újratölteni: táblák ürítése (pl. `php artisan migrate:fresh --seed`).

### Git workflow (kezdeti beállítás)
Indítás: `git init`, majd első commit az aktuális állapotról. Javasolt további lépések:
1. Hozz létre egy új GitHub repót (pl. `pizzashop-assignment`).
2. Add hozzá remote-ot: `git remote add origin https://github.com/<felhasznalo>/<repo>.git`
3. Push: `git push -u origin main`
4. Későbbi fejlesztésekhez: feature branch-ek (`git switch -c feature/diagram-export`) és Pull Request.

Ajánlott első további szétbontott commitok (opcionális, history rekonstruáláshoz):
- chore: add initial Laravel scaffold (nem rekonstruálható teljesen utólag)
- feat: add role middleware + admin seeder
- feat: add products/messages models & CRUD
- feat: integrate pizza dataset (PizzaSeeder)
- docs: add extended deployment & dataset docs


Admin belépés (seed):
- Email: admin@example.com
- Jelszó: Admin12345

User belépés (seed):
- Email: user@example.com
- Jelszó: User12345

## Helyi futtatás

Előfeltételek: PHP 8.2, Composer, Node 20+, SQLite driver (pdo_sqlite, sqlite3).

```powershell
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
npm ci
npm run dev
php artisan serve
```

## Tesztek

```powershell
php artisan test
```

## Deployment (megosztott tárhely / Nethely / cPanel / Apache)

Rövid checklist (Nethely):
1. PHP verzió: 8.2 vagy 8.3. Engedélyezd: `pdo_mysql`, `fileinfo`, `mbstring`, `openssl`, `curl`, `dom`, `gd`.
2. Adatbázis: létrehozás (MySQL), jegyezd fel: host, db név, user, jelszó.
3. Document Root mutasson a projekt `public` mappájára. (Nethely panelen állítsd át; ha nem lehetséges, másold a `public` tartalmát a `public_html`-ba és tartsd meg az eredeti könyvtárszerkezetet a gyökérben.)
4. Lokális build:
```powershell
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan key:generate
php artisan migrate --force --seed
```
5. Feltöltés: töltsd fel az egész projektet (különösen: `vendor/`, `public/build/`, `.env`). Ha nagy a `vendor`, csomagold zip-be és a szerveren bontsd ki.
6. `.env` (prod):
```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://SAJAT-DOMEN.HU
LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=adatbazis_nev
DB_USERNAME=felhasznalo
DB_PASSWORD=jelszo
```
7. Cache optimalizálás (SSH esetén):
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
8. Jogosultságok: `storage/` és `bootstrap/cache/` írható (755 vagy 775). Ha hiba: `chmod -R 775 storage bootstrap/cache`.
9. Ellenőrzés: nyisd meg a domaint. Ha nincs stílus, nézd meg hogy `public/build/manifest.json` és a hashed CSS/JS ott van-e.
10. Frissítés új build esetén: csak `public/build` mappa cseréje + opcionális új composer függőségek.

Dev server (5174) hiba magyarázat: a korábbi `@vite` direktíva fejlesztői módot próbált, ezért a böngésző a nem futó Vite szerverhez kért erőforrást és `ERR_CONNECTION_REFUSED` lett. Productionban manuálisan hivatkozunk a manifest bejegyzésekre, így ez megszűnik.

## Deployment (Docker, nginx + php-fpm + MySQL)

Használd a mellékelt `Dockerfile` és `docker-compose.yml` fájlokat (létrehozva ebben a repo-ban):

```bash
docker compose up -d --build
docker compose exec app php artisan migrate --seed --force
```

Alapértelmezett URL: http://localhost:8080

## Környezeti minták

Prod minta: `.env.production.example` (MySQL)

Dev (lokális): `.env.example` (SQLite)

## Gyors hibaelhárítás
- 500/white page: ellenőrizd az `APP_KEY`-t és a `storage/` jogosultságokat.
- 404 minden útvonalra: Apache-nál engedélyezd a mod_rewrite-t és a `.htaccess`-t a `public/` alatt.
- Asset hiányzik: futtasd `npm run build`, töltsd fel a `public/build` mappát.

## Licenc
MIT

## Dokumentáció
Teljes dokumentáció a `docs/` mappában (index: `docs/00-index.md`).
