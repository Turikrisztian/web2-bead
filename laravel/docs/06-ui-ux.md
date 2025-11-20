# 6. UI/UX és reszponzív téma

Alap: Breeze + Tailwind, navigáció: `resources/views/layouts/navigation.blade.php`

Fő elvek:
- Egységes komponensek (`x-...`), pl. `x-flash`
- Reszponzív táblázatok (overflow-x)
- Kontrasztos gombok, vissza linkek

Színek / tipográfia:
- Tailwind default paletta; primary gombok: `bg-indigo-600 hover:bg-indigo-700`.
- Heading struktúra: `h1` oldalcím, `h2` szekciók.

Felhasználói visszajelzés:
- Flash üzenetek: siker / hiba (zöld / piros háttér).
- Validáció hiba: vörös keret + kis magyarázó szöveg.

Mobil optimalizáció:
- Menü hamburger ikon (Breeze alap), táblázatok scroll-able.
- Form elemek teljes szélesség smartphone-n.

Elérhetőség (Accessibility):
- Kontrasztos gombszínek.
- Aria attribútumok a dropdown komponenseknél Breeze-ben.

Lehetséges jövőbeli fejlesztés:
- Sötét mód Tailwind `dark:` variánsokkal.
- Komponens könyvtár bővítés (pl. badge, modal).
