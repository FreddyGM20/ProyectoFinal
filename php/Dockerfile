FROM php:8.0-apache
WORKDIR /php
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
RUN apt-get update && apt-get install curl
