FROM php:5.6-apache

RUN apt update
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable mysqli
RUN service apache2 restart
RUN apt-get update && apt-get upgrade -y


EXPOSE 8000
