FROM php:8.1-apache

RUN apt-get update && apt-get install -y libxml2-dev && docker-php-ext-install soap

RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

VOLUME /var/www/html/