FROM php:7.2.0-fpm-alpine

RUN docker-php-ext-install mysqli pdo_mysql mysqli exif
