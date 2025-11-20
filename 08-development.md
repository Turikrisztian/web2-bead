# 8. Fejlesztői workflow

Ajánlott lépések:
- Git feature branch-ek
- `php artisan test` futtatása
- Kódformázás: Pint (`vendor/bin/pint`)
- Commit üzenetek: conventional commits (feat, fix, chore)

Branch stratégia példa:
- `main` – stabil, deployra kész.
- `develop` – integrációs ág (opcionális).
- `feat/<feature-name>` – új funkciók.
- `fix/<issue>` – hibajavítás.

Példa commit üzenetek:
```
feat(product): létrehozási nézet validációval
fix(order): null total számítás javítása
chore(docs): bővített architektúra leírás
```

Kódminőség:
```powershell
vendor\bin\pint
php artisan test --coverage
```

Hasznos artisan parancsok:
```powershell
php artisan tinker
php artisan route:list
php artisan migrate:status
```
