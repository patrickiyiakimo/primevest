#!/bin/bash
# Runs on the App service as the Pre-Deploy Command.
set -e

echo "---- database diagnostics ----"
echo "DB_CONNECTION=${DB_CONNECTION:-<unset>}"
echo "DB_HOST=${DB_HOST:-<unset>}"
echo "DB_DATABASE=${DB_DATABASE:-<unset>}"
if [ -z "${DB_URL:-}" ]; then
    echo "DB_URL: EMPTY  <-- Laravel falls back to 127.0.0.1 and refuses the connection"
else
    php -r '$u = parse_url((string) getenv("DB_URL")); echo "DB_URL: set, host=" . ($u["host"] ?? "<unparseable>") . PHP_EOL;'
fi
echo "--------------------------------"

php artisan migrate --force --no-interaction
php artisan storage:link || true

php artisan optimize:clear
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
