FROM php:8.1-apache

RUN apt-get update && apt-get install -y libxml2-dev && docker-php-ext-install soap
RUN a2enmod rewrite

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
