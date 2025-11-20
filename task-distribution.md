# Csapat feladatmegosztás

| Funkció / Követelmény | Fő felelős | Megjegyzés |
|-----------------------|-----------|-----------|
| Auth + szerepkörök (users.role, middleware) | Türi Krisztián | RoleMiddleware, seeding admin |
| Termék CRUD (Products) | Takács Milán | Blade formák, partial `_form` |
| Kategóriák + termék seed | Türi Krisztián | `CategoryProductSeeder` |
| Üzenetküldés (Kapcsolat) + mentés | Takács Milán | Validáció + form nézet |
| Üzenetek lista (Messages) | Türi Krisztián | Időrendi rendezés DESC |
| Diagram (Chart.js) | Türi Krisztián | Statisztikai adatok előkészítése |
| Admin dashboard | Takács Milán | Statisztikai számok, recent lists |
| Pizza külső dataset integráció | Mindkettő | `PizzaSeeder` kommentálva |
| Layout/UI Breeze visszaállítás | Takács Milán | Halcyonic kísérlet dokumentálva |
| Dokumentáció (15+ oldal) | Mindkettő | Képernyőképek, mapping táblázatok |
| Git verziókövetés és PR folyamat | Mindkettő | Branch elnevezési séma |
| Deployment és .env beállítás | Türi Krisztián | Hosting + DB |

## Branch javaslatok
- `krisztian/auth-role-middleware`
- `milan/products-crud`
- `krisztian/diagram-stats`
- `milan/admin-dashboard-ui`
- `shared/pizza-dataset`

## Commit üzenet sablonok
- `feat: products CRUD views (Milan)`
- `feat: role middleware & admin seeder (Krisztian)`
- `feat: chart diagram stats (Krisztian)`
- `feat: pizza dataset seeder (Both)`
- `docs: add requirement mapping (Both)`

