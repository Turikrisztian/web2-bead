# 13. Biztonság és best practice

- `APP_KEY` kötelező (prod)
- `APP_DEBUG=false` prodon
- Jelszavak: bcrypt/argon2, sosem plain text
- CSRF: `VerifyCsrfToken` aktív a web útvonalaknál
- Input validáció controllerben
- Szerepkör ellenőrzés middleware-ben

További ajánlások:
- Rate limiting: `Route::middleware('throttle:60,1')` publikus POST végpontokra.
- XSS védelem: Blade alapértelmezett escaping; HTML szükség esetén `@{!! !!}@` kerülése.
- SQL injection: Eloquent bind-olja paramétereket.
- Jelszó policy: min 8 karakter, vegyes karakterkészlet (jövőbeli validáció).
- Biztonságos session: HTTPS + `SESSION_SECURE_COOKIE=true` prodon.
- Függőségek frissítése: `composer outdated`, `npm audit`.

Lehetséges bővítés:
- Audit log (model events) kritikus műveletekre.
- 2FA (Laravel Fortify / Google Authenticator integráció).
