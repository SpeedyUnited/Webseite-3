FROM nginx:alpine

RUN apk add --no-cache \
		php83 \
		php83-fpm \
		php83-opcache \
		php83-mysqli \
		php83-pdo \
		php83-pdo_mysql \
		php83-mbstring \
		php83-json \
		php83-curl \
		php83-xml \
		php83-zip \
		php83-gd \
		php83-session \
		php83-phar \
		php83-tokenizer \
	&& sed -i 's|^listen = .*|listen = 127.0.0.1:9000|' /etc/php83/php-fpm.d/www.conf \
	&& sed -i 's|^user = .*|user = nginx|' /etc/php83/php-fpm.d/www.conf \
	&& sed -i 's|^group = .*|group = nginx|' /etc/php83/php-fpm.d/www.conf

COPY src /usr/share/nginx/html
COPY config/nginx.conf /etc/nginx/conf.d/default.conf
COPY config/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
	CMD wget -q -O- http://127.0.0.1/ >/dev/null 2>&1 || exit 1

ENTRYPOINT ["/entrypoint.sh"]