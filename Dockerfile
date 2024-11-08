FROM php:apache
RUN docker-php-ext-install pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN a2enmod rewrite

EXPOSE 80
