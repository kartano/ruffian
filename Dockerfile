FROM php:8.2-apache

ENV TZ=America/Phoenix

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN printf "date.timezone = America/Phoenix\n" >> /usr/local/etc/php/php.ini

# Punch up memory sizes for posts and memory use
RUN sed -i.bak 's,^post_max_size =.*$,post_max_size = 512M,' /usr/local/etc/php/php.ini
RUN sed -i.bak 's,^memory_limit =.*$,memory_limit = 512M,' /usr/local/etc/php/php.ini

RUN a2enmod rewrite

# Global utils
RUN apt-get update && apt-get install iputils-ping git libzip-dev libonig-dev vim wget openssl unzip zip sudo -y

# Install Composer
RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extenions
RUN docker-php-ext-install pdo && docker-php-ext-enable pdo
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache
RUN docker-php-ext-install zip && docker-php-ext-enable zip
RUN docker-php-ext-install mbstring && docker-php-ext-enable mbstring
RUN apt-get update && \
apt-get install libldap2-dev -y && \
rm -rf /var/lib/apt/lists/* && \
docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
docker-php-ext-install ldap

# Add PHP opcache settings
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0"
COPY ./build/docker/compose/php/opcache.ini "$PHP_INI_DIR/conf.d/opcache.ini"

# Install Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
RUN apt-get update && apt-get install symfony-cli -y

# Cleanup
RUN apt-get autoremove -y && apt-get clean y
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/cache/*

#  BASH as default script
RUN ln -sf /bin/bash /bin/sh

COPY . /srv/www
WORKDIR /srv/www

EXPOSE 80
