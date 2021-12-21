FROM php:7.1.33-apache

ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

RUN cd /usr/bin \
  && curl -s http://getcomposer.org/installer | php \
  && ln -s /usr/bin/composer.phar /usr/bin/composer

RUN apt-get update \
  && apt-get install --no-install-recommends -y wget git zip vim unzip libpq-dev libonig-dev \
  && docker-php-ext-install pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - \
  && apt-get install --no-install-recommends -y nodejs \
  && npm install -g npm@latest

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite
