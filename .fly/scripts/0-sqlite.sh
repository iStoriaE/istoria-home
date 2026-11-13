#!/usr/bin/env bash
# The SQLite database lives on the fly volume mounted at /data.
# A brand-new volume gets an empty, migrated database; the real one is copied in by hand.
set -e
db="${DB_DATABASE:-/data/database.sqlite}"
if [ ! -f "$db" ]; then
    mkdir -p "$(dirname "$db")"
    touch "$db"
    php /var/www/html/artisan migrate --force --no-interaction
fi
# SQLite writes journal files next to the database, so the folder must be writable too.
chown -R www-data:www-data "$(dirname "$db")"
