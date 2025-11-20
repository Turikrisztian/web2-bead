# Beadandó Laravel Alkalmazás – Teljes Dokumentáció (Összesített)

Verzió: v1.0.0  
Dátum: 2025-11-14  
Projekt: Laravel 12 + Breeze alapú webalkalmazás (termékek, üzenetek, rendelések, diagram, admin)

## Tartalomjegyzék
1. Követelmények és feladatleírás
2. Rendszerarchitektúra
3. Adatmodell és migrációk
4. Útvonalak és menük
5. Hitelesítés és szerepkörök
6. UI/UX és reszponzív téma
7. Telepítés (lokális környezet)
8. Fejlesztői workflow
9. Tesztelés
10. Deploy – megosztott tárhely
11. Deploy – Docker
12. Hibakeresés (Troubleshooting)
13. Biztonság
14. Biztonság

---

## 1. Követelmények és feladatleírás
(Forrás: 01-spec.md)

Lásd a megvalósított funkciók listáját, nem-funkcionális követelmények, use-case leírások, korlátozások, jövőbeli bővítési ötletek.

## 2. Rendszerarchitektúra
(Forrás: 02-architecture.md)

Technológiák, komponensek, rétegek, döntések, skálázhatósági jegyzetek, refaktor pontok, folyamat diagram.

## 3. Adatmodell és migrációk
(Forrás: 03-data-model.md)

Táblák részletes mezőleírásokkal, kapcsolatok, indexek, Eloquent példák, szöveges ER-diagram.

## 4. Útvonalak és menük
(Forrás: 04-routes.md)

Route táblázat HTTP metódusokkal, név, middleware, szerepkör alapú navigáció.

## 5. Hitelesítés és szerepkörök
(Forrás: 05-auth-roles.md)

Szerepkör ellenőrzés folyamata, middleware használat, jogosultság mátrix, jelszó visszaállítás jövőbeli bővítés.

## 6. UI/UX és reszponzív téma
(Forrás: 06-ui-ux.md)

Komponensek, színpaletta, tipográfia, mobil optimalizáció, elérhetőség, bővítési ötletek.

## 7. Telepítés (lokális)
(Forrás: 07-install.md)

Telepítési parancsok Windowsra, PowerShell policy jegyzet, alternatív MySQL konfiguráció, production build.

## 8. Fejlesztői workflow
(Forrás: 08-development.md)

Branch stratégia, commit üzenet példák, kódminőség parancsok, artisan parancsok.

## 9. Tesztelés
(Forrás: 09-testing.md)

Feature tesztek, coverage futtatás, jövőbeli bővítési ötletek.

## 10. Deploy – megosztott tárhely
(Forrás: 10-deployment-shared-hosting.md)

Lépések, `.env` kulcsok, jogosultságok, cache optimalizálás, cron ötletek.

## 11. Deploy – Docker
(Forrás: 11-deployment-docker.md)

Compose szolgáltatások, hasznos parancsok, jövőbeli multi-stage build ötletek.

## 12. Hibakeresés
(Forrás: 12-troubleshooting.md)

Gyakori hibák, további hibák, debug tippek, log hivatkozás.

## 13. Biztonság
(Forrás: 13-security.md)

Alap biztonsági beállítások, további ajánlások, lehetséges bővítések (2FA, audit log, rate limiting).

## 14. Biztonság (összegzés)
Alap biztonsági beállítások, jelszó hash, CSRF, szerepkör ellenőrzés.

---

## PDF Export Útmutató

### 1) VS Code Markdown PDF (extension) használata
- Telepítsd az "Markdown PDF" kiegészítőt.
- Nyisd meg ezt a fájlt (`docs/00-all-in-one.md`).
- Parancspaletta: "Markdown PDF: Export (pdf)".
- Eredmény: `00-all-in-one.pdf` a gyökérben vagy ugyanabban a mappában.

### 2) Pandoc parancssori módszer (ajánlott minőség)
Ha van Chocolatey:
```powershell
choco install pandoc -y
```
Ha nincs: töltsd le a pandoc Windows telepítőt a hivatalos oldalról és telepítsd.

Export parancs:
```powershell
cd "c:\Users\krisz\OneDrive\Asztali gép\5. felev beadandok\web2 eloadas\beadandonew"
pandoc docs/00-all-in-one.md -o beadando-dokumentacio.pdf --from markdown --pdf-engine=wkhtmltopdf -V geometry:margin=2cm
```
Alternatív PDF engine (ha nincs wkhtmltopdf):
```powershell
pandoc docs/00-all-in-one.md -o beadando-dokumentacio.pdf -V geometry:margin=2cm
```

### 3) Egyesítés és formázás tippek
- Ha külön fejezetekből szeretnél PDF-et: `pandoc docs/0*-*.md -o beadando-dokumentacio.pdf`.
- Tartalomjegyzék automatikusan: `-V toc` vagy `--toc` kapcsoló.
```powershell
pandoc docs/0*-*.md -o beadando-dokumentacio.pdf --toc -V geometry:margin=2cm
```

### 4) UTF-8 ellenőrzés
A fájlok BOM nélkül UTF-8 formátumúak. Ha ékezetes karakter gond lenne:
```powershell
Get-Content docs/00-all-in-one.md | Out-File -Encoding UTF8 docs/00-all-in-one-utf8.md
```

### 5) Verziómentés
Miután a PDF elkészült, commit:
```powershell
git add docs/00-all-in-one.md beadando-dokumentacio.pdf
git commit -m "docs: aggregated markdown + PDF export"
```

---

## Záró megjegyzés
Ez az összesített fájl a beadandó teljes dokumentációja. A moduláris eredeti fájlok továbbra is önállóan karbantarthatók.
