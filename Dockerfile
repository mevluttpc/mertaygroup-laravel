FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
