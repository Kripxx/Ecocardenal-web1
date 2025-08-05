# Usa una imagen base con PHP, Composer y extensiones necesarias
FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    zip \
    unzip \
    git \
    nodejs \
    npm

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia el contenido del proyecto al contenedor
COPY . .

# Instala dependencias de PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Instala dependencias de JavaScript y compila los assets
RUN npm install && npm run build

# Da permisos al directorio de Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Expone el puerto 8000 (Laravel serve)
EXPOSE 8000

# Establece la variable de entorno para producción
ENV APP_ENV=production

# Comando para iniciar la aplicación
CMD php artisan serve --host=0.0.0.0 --port=8000