# 1. Követelmények és feladatleírás

Ebben a dokumentumban összefoglaljuk a beadandó feladat követelményeit és a megvalósított funkciókat.

Főbb követelmények (összefoglalva):
- Reszponzív téma és egységes UI
- Bejelentkezés/regisztráció, szerepkörök (admin, user)
- Kezdőlap és menük
- 3+ táblás adatbázis és ORM használat
- Kapcsolat űrlap validálással, üzenetek mentése és megjelenítése
- Diagram/ábra (Chart.js) adatok vizualizációjára
- Teljes CRUD legalább egy táblára (Termékek)
- Admin menü/dashboards
- Hostingra deploy
- Verziókövetés (Git/GitHub), több commit és együttműködés láthatóság
- 15+ oldalas dokumentáció

Megvalósítás röviden:
- Laravel 12 + Breeze (Blade stack)
- Szerepkör a `users` táblában (`role`), `RoleMiddleware`
- Táblák: users, messages, categories, products, orders
- Products: teljes CRUD, Orders: egyszerű rendelés létrehozása
- Kapcsolat űrlap: Message mentés, validáció
- Diagram: kategóriánkénti termékszám, Chart.js
- Admin dashboard: számlálók, legutóbbi üzenetek és termékek
- Reszponzív UI: Tailwind/Breeze komponensek
- Deployment: cPanel/Apache és Docker útmutató

Nem-funkcionális követelmények:
- Teljesítmény: kis dataset mellett <200ms válaszidő (lokálisan) az alap oldalakon.
- Biztonság: CSRF védelem, auth middleware minden védett útvonalon, role alapú hozzáférés.
- Karbantarthatóság: Rétegezett controller logika, tiszta modellek, konfigurálható `.env`.
- Bővíthetőség: Új szerepkör (pl. `moderator`) könnyen hozzáadható a `role` mező kiterjesztésével.

Use-case rövid leírások:
1. Látogató beküld kapcsolati űrlapot -> rendszer menti üzenetet, admin látja.
2. Regisztrált user terméket böngész és rendel -> Order rekord létrejön.
3. Admin új terméket hoz létre -> megjelenik a publikus listában, diagram frissül.
4. Admin ellenőrzi a napi statisztikákat -> Dashboard számlálók és legutóbbi elemek.

Korlátozások:
- Fizetési integráció nincs (rendelés csak demonstráció).
- Többnyelvűség nem került implementálásra.
- Fájl feltöltés nincs (csak szöveges adatok).

Jövőbeli bővítési ötletek:
- Kép feltöltés a termékekhez (Storage + intervention/image).
- Email értesítés új üzenet vagy rendelés esetén (Mailables / Notifications).
- Role alapú finom jogosultság (policy-k, Gate-ek).
- Cache réteg (Redis) a diagram adatokhoz.
