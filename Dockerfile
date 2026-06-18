FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        unzip \
        libpq-dev \
        libpng-dev \
        libjpeg-dev \
        && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring gd && \
    a2enmod rewrite

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --optimize-autoloader

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf && \
    chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
