FROM php:7.4-apache

ENV APACHE_DOCUMENT_ROOT=/app/src/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt update && apt install -y git zip unzip wget supervisor

RUN mkdir -p /sdk
ADD ./codegen /sdk/codegen
ADD ./lib /sdk/lib
ADD ./composer.json /sdk
ADD ./composer.lock /sdk

RUN mkdir -p /app
ADD ./sample-apps/timeline-app/composer.json /app
ADD ./sample-apps/timeline-app/composer.lock /app

WORKDIR /app
RUN /usr/local/bin/composer install

COPY ./sample-apps/timeline-app/docker/supervisor/processes.conf /etc/supervisor/conf.d/apache.conf
 
ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz
