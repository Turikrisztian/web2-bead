# 4. Útvonalak és menük

Publikus:
- `/` – Kezdőlap
- `/contact` GET/POST – Kapcsolat űrlap
- `/diagram` – Diagram

Auth szükséges:
- `/messages` – Üzenetek listázása (admin: összes, user: saját/email)
- `products/*` – Products CRUD (resource)
- `/admin` – admin dashboard (role: admin)

Lásd: `routes/web.php`

Részletes route táblázat (összefoglaló):
| Method | URI | Név | Middleware | Leírás |
|-------|-----|-----|------------|--------|
| GET | / | home | web | Kezdőlap |
| GET | /contact | contact.show | web | Kapcsolat űrlap megjelenítés |
| POST | /contact | contact.store | web | Üzenet mentés |
| GET | /diagram | diagram | web | Statisztikai diagram |
| GET | /messages | messages.index | auth | Üzenetek listája |
| GET | /admin | admin.index | auth,role:admin | Admin dashboard |
| Resource | /products | products.* | auth | Termék CRUD |
| POST | /orders | orders.store | auth | Rendelés létrehozása |

Navigáció szerepkör szerint:
- Vendég: Home, Kapcsolat, Diagram, Login/Register.
- User: +Termékek, Üzeneteim.
- Admin: +Admin, (minden termék / üzenet). 
