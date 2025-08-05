# Usa PHP 8.2 con FPM como base
FROM php:8.2-fpm

# Instala dependencias del sistema y extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    npm \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Copia Composer desde su imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo del proyecto
WORKDIR /var/www

# Copia el contenido del proyecto al contenedor
COPY . .

# Instala dependencias de PHP con Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Instala dependencias de JavaScript y compila los assets (si usas Vite o Mix)
RUN npm install && npm run build

# Asigna permisos correctos a storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 storage bootstrap/cache

RUN php artisan storage:link

# Expone el puerto 8000, que es el que usará php artisan serve
EXPOSE 8000

# Establece la variable de entorno para producción
ENV APP_ENV=production

# Comando para iniciar el servidor de Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000