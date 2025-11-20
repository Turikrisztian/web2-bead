FROM dunglas/frankenphp:1-php8.2

WORKDIR /app

COPY composer.json composer.lock /app/
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader

COPY . /app

# Build assets
RUN apt-get update && apt-get install -y nodejs npm && npm ci && npm run build && rm -rf node_modules

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV SERVER_NAME=:8080

# Optimize Laravel
RUN php artisan key:generate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache

EXPOSE 8080

CMD ["php", "artisan", "octane:start", "--server=frankenphp", "--port=8080", "--max-requests=500"]
