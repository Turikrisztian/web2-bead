# 5. Hitelesítés és szerepkörök

Hitelesítés: Laravel Breeze (Blade stack)

Szerepkörök:
- `users.role` mező (default: user)
- `RoleMiddleware` – ellenőrzi a kívánt szerepet (pl. `role:admin`)

Használat:
```php
Route::get('/admin', AdminController::class.'@index')
  ->middleware(['auth','role:admin']);
```

Belépési folyamat:
1. User beírja email/jelszó.
2. Laravel Auth ellenőrzi hash-t.
3. Siker esetén session létrejön, `Auth::user()` elérhető.
4. Middleware láncban `role:admin` összeveti a `user->role` értéket.

Szerepkör mátrix (jogosultság kivonat):
| Funkció | Vendég | User | Admin |
|---------|--------|------|-------|
| Kapcsolat űrlap beküldés | ✓ | ✓ | ✓ |
| Saját üzenetek listázása | - | ✓ | ✓ (minden) |
| Termékek megtekintése | ✓ | ✓ | ✓ |
| Termék CRUD | - | ✓ (ha döntés: itt most teljes) | ✓ |
| Diagram | ✓ | ✓ | ✓ |
| Admin dashboard | - | - | ✓ |

Jelszó visszaállítás (opcionális bővítés): Breeze támogatja, `.env` MAIL_* beállítás után aktiválható.
