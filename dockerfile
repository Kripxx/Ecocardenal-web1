FROM php:8.1-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libonig-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto Laravel al contenedor
COPY . /var/www
WORKDIR /var/www

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Puerto que usará Laravel
EXPOSE 8000

# Comando de inicio
CMD php artisan serve --host=0.0.0.0 --port=8000