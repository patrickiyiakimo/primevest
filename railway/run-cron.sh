#!/bin/bash
# Custom Start Command for a separate Cron service.
# Drives the daily investments:complete task declared in app/Console/Kernel.php.
while true; do
    php artisan schedule:run --verbose --no-interaction
    sleep 60
done
