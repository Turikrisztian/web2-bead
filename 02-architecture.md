# 2. Rendszerarchitektúra

Technológiák:
- Backend: PHP 8.2, Laravel 12
- Frontend: Blade + Tailwind (Breeze), Chart.js
- Adatbázis: SQLite (dev), MySQL (prod ajánlott)

Fő komponensek:
- Kontroller réteg: `ContactController`, `MessageController`, `ProductController`, `OrderController`, `DiagramController`, `AdminController`
- Middleware: `Authenticate`, `RedirectIfAuthenticated`, `RoleMiddleware`
- Modellek: `User`, `Message`, `Category`, `Product`, `Order`

Könyvtárstruktúra (részlet):
- `app/Http/Controllers/*`
- `app/Http/Middleware/*`
- `app/Models/*`
- `database/migrations/*`
- `resources/views/*`

Adatfolyam példa – rendelés:
1. Felhasználó a termék oldalon mennyiséget választ
2. `OrderController@store` validál, ment `orders`-be
3. Redirect vissza a termék oldalra flash üzenettel

Rétegek részletezve:
- HTTP réteg: Route -> Middleware -> Controller -> Response (Blade view / redirect / JSON)
- Domain réteg: Eloquent modellek + kapcsolatok, validáció controllerben.
- Adat réteg: Migrációk, seederek; SQLite dev, MySQL prod.

Architekturális döntések:
- Eloquent használata az ORM egyszerűsége miatt; repository minta nem szükséges kis méretnél.
- Breeze választása az auth gyors implementációja miatt (regisztráció, login, password reset később bővíthető).
- Tailwind: utility-first gyors prototipizálás.
- Chart.js: könnyű integráció, CDN vagy npm.

Skálázhatóság (elméleti):
- Adatbázis váltás: `.env` DB_* változókkal MySQL-re.
- Horizontális skálázás: stateless PHP konténerek + megosztott DB + cache (Redis) bevezetése.

Potenciális refaktor pontok:
- Validációk form request osztályokba (`FormRequest`) szervezése.
- Service osztály `OrderService` a rendelés logikához (összeg számítás, készlet kezelés – későbbi fejlesztés).

Egyszerű "diagram" leírás (szöveges):
```
[Browser] --HTTP--> [Laravel Routes] --Controller--> [Models] --SQL--> [DB]
									 |-> [Chart.js JSON adat]
```
