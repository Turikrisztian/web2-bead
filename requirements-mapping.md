# Követelmény Mapping

| Követelmény | Megvalósítás | Fájlok / Hivatkozás |
|-------------|--------------|---------------------|
| Két fős csapat, feladatmegosztás | Táblázat a `task-distribution.md`-ben | `docs/task-distribution.md` |
| Külső adatbázis kiválasztása | Pizza shop dataset (kategóriák + pizzák + mintarendelések) | `database/seeders/PizzaSeeder.php` |
| Laravel szerver oldali app | Teljes keret, route-ok, controller-ek | `routes/web.php`, `app/Http/Controllers/*` |
| Reszponzív téma | Breeze (Tailwind). Halcyonic kísérlet visszavonva | `resources/views/layouts/app.blade.php` |
| Autentikáció (regisztráció, login, logout) | Breeze scaffold + role mező | `resources/views/auth/*.blade.php` |
| Szerepkörök (guest, user, admin) | role oszlop + middleware ellenőrzés | `database/migrations/*users*`, `app/Http/Middleware/RoleMiddleware.php` |
| Főoldal bemutatás | Kártyák + linkek | `resources/views/home.blade.php` |
| Adatbázis menü (3 tábla) | Termékek, kategóriák, rendelések (és pizza adat) | `products/*`, `orders`, `categories` modellek |
| ORM használat | Eloquent modellek | `app/Models/*` |
| Migrációk & Seeding | Létrehozva + admin/pizza seed | `database/migrations/*`, `database/seeders/*` |
| Kapcsolat űrlap + validáció | Szerver oldali validáció + mentés üzenetek táblába | `ContactController`, `resources/views/contact/form.blade.php` |
| Üzenetek lista időrendben | Paginált, DESC szerint | `MessageController@index`, `messages/index.blade.php` |
| Diagram Chart.js | Kategória / termék statisztika | `diagram/index.blade.php`, `DiagramController` |
| CRUD egy táblához | Products CRUD | `ProductController`, `products/*.blade.php` |
| Admin menü | Statisztikák összesítése | `admin/index.blade.php`, `AdminController` |
| Hosting / Deployment | Környezeti beállítások, futtatás | `.env` (nem publikus), dokumentáció fejezet |
| Git verziókövetés | (Inicializálás folyamatban) Branch/commit sablonok | `docs/task-distribution.md` |
| Projektmunka láthatóság | Branch név konvenció + commit prefixek | Git log (később) |
| 15+ oldalas dokumentáció | Külön PDF (export útmutató) | `docs/` + PDF végén |
| Halcyonic próbálkozás dokumentálása | Visszaállás Breeze-re | `resources/views/layouts/halcyonic.blade.php` (stub) |

## Diagram adatforrás leírás
- Labels: kategória nevek
- Values: termékszám kategóriánként (elektronika + pizza seed kombinált)

## További bővítés ötletek
- Pizza méret mező (új migráció: `size` enum)
- Gluténmentes flag (`is_gluten_free` boolean)
- Rendelések részletes státusz mező

