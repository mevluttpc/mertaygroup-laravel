FROM php:8.1-apache

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Apache rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/storage

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 80

CMD ["apache2-foreground"]
