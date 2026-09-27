#!/bin/bash
# Custom Start Command for a separate Worker service.
# QUEUE_CONNECTION=database, so queued mail needs this to be drained.
set -e

php artisan queue:work --sleep=3 --tries=3 --max-time=3600
