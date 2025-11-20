# 11. Deploy – Docker

Parancsok:
```bash
docker compose up -d --build
docker compose exec app php artisan migrate --seed --force
```

Elérés: http://localhost:8080

`docker-compose.yml` komponensek (rövid):
- app: Laravel + PHP (FrankenPHP) konténer.
- db: MySQL (ha beállítva) – volume persistálja az adatokat.

Hasznos parancsok:
```bash
docker compose logs -f app
docker compose exec app php artisan route:list
docker compose down --remove-orphans
```

Production build (multi-stage) jövőbeli ötlet: külön stage a vendor installhoz és az asset buildhez.
