FROM php:8.2-fpm-alpine
WORKDIR /usr/share/nginx/html
COPY src /usr/share/nginx/html
