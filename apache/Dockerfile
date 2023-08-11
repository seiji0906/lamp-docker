FROM php:apache

RUN docker-php-ext-install mysqli
RUN apt-get update
RUN apt-get install vim -y

COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf
