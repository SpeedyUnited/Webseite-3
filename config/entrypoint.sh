#!/bin/sh
set -e

# ── Graceful Shutdown: PHP-FPM sauber beenden ───────────────────────────────
cleanup() {
	echo "Shutting down …"
	kill "$PHP_PID" 2>/dev/null
	wait "$PHP_PID" 2>/dev/null
	exit 0
}
trap cleanup SIGTERM SIGINT SIGQUIT
# ── Dev-Modus: OPcache-Revalidierung einschalten ──────────────────────────
if [ "${APP_ENV:-production}" = "development" ]; then
	echo "[DEV] OPcache validate_timestamps aktiviert"
	# Prod-Config überschreiben statt separate Datei (vermeidet Ladereihenfolge-Problem)
	sed -i 's/opcache.validate_timestamps=0/opcache.validate_timestamps=1/' /etc/php83/conf.d/99-opcache-prod.ini
	echo 'opcache.revalidate_freq=0' >> /etc/php83/conf.d/99-opcache-prod.ini
fi
# ── PHP-FPM starten ─────────────────────────────────────────────────────────
php-fpm83 -F &
PHP_PID=$!

# ── Nginx (Vordergrund) ─────────────────────────────────────────────────────
exec nginx -g 'daemon off;'
