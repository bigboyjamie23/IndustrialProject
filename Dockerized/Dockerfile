FROM php:7.4-apache
RUN apt-get update && apt upgrade -y
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
COPY src /var/www/html/
EXPOSE 80/tcp
EXPOSE 443/tcp