#!/bin/bash
# Runs on the App service as the Pre-Deploy Command.
# Rebuilds the framework caches against runtime env, not build-time env.
set -e

php artisan migrate --force --no-interaction

php artisan optimize:clear
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
