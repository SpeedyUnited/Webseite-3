###############################################################################
# Single-Image: Nginx + PHP-FPM auf Alpine
# Vorlage für statische / PHP-Webseiten als ein Docker-Image.
###############################################################################
FROM nginx:alpine

LABEL maintainer="SpeedyUnited" \
      description="Single-Image Webseite (Nginx + PHP-FPM)" \
      org.opencontainers.image.source="https://github.com/SpeedyUnited/Grundseite-Standard-Docker"

# ── PHP + Extensions installieren ────────────────────────────────────────────
RUN apk add --no-cache \
		php83 \
		php83-fpm \
		php83-opcache \
		php83-mysqli \
		php83-pdo \
		php83-pdo_mysql \
		php83-mbstring \
		php83-curl \
		php83-xml \
		php83-zip \
		php83-gd \
		php83-session \
		php83-phar \
		php83-tokenizer \
	&& ln -sf /usr/bin/php83 /usr/bin/php \
	# PHP-FPM: als nginx-User auf 127.0.0.1:9000
	&& sed -i 's|^listen = .*|listen = 127.0.0.1:9000|' /etc/php83/php-fpm.d/www.conf \
	&& sed -i 's|^user = .*|user = nginx|'               /etc/php83/php-fpm.d/www.conf \
	&& sed -i 's|^group = .*|group = nginx|'              /etc/php83/php-fpm.d/www.conf \
	# OPcache-Tuning für kleine Seiten
	&& { \
		echo 'opcache.enable=1'; \
		echo 'opcache.memory_consumption=64'; \
		echo 'opcache.max_accelerated_files=2000'; \
		echo 'opcache.validate_timestamps=0'; \
	} > /etc/php83/conf.d/99-opcache-prod.ini \
	# Default-Nginx-Config entfernen
	&& rm -f /etc/nginx/conf.d/default.conf

# ── Konfiguration ───────────────────────────────────────────────────────────
COPY config/nginx.conf   /etc/nginx/conf.d/default.conf
COPY config/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# ── Webseiten-Dateien ───────────────────────────────────────────────────────
COPY --chown=nginx:nginx src /usr/share/nginx/html

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
	CMD wget -q -O- http://127.0.0.1/ >/dev/null 2>&1 || exit 1

ENTRYPOINT ["/entrypoint.sh"]