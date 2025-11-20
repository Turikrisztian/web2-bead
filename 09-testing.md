# 9. Tesztelés

Parancs:
```powershell
php artisan test
```

Feature tesztek:
- `tests/Feature/ProductCrudTest.php` – CRUD és rendelés

Gyáriak:
- `database/factories/*Factory.php`

Teszttípusok:
- Feature teszt: HTTP request + adatbázis interakciók ellenőrzése.
- Unit teszt (nincs külön létrehozva): Lehetséges jövőbeni service osztályokra.

Futtatás coverage-el (ha Xdebug engedélyezve):
```powershell
php artisan test --coverage --min=80
```

Adatbázis tesztnél: Laravel automatikusan tranzakcióba csomagolja (RefreshDatabase trait).

Jövőbeli bővítés:
- Order kalkuláció külön unit teszt.
- Policy tesztek (ha hozzáadjuk). 
