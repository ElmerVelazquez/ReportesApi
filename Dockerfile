FROM php:8.5-fpm
# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \ 
    curl \ 
    libpng-dev \ 
    libjpeg-dev \ 
    libfreetype6-dev \ 
    libonig-dev \ 
    libxml2-dev \ 
    zip \ 
    unzip \ 
    mariadb-client
# Instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd xml
# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Configurar el directorio de trabajo
WORKDIR /app
# Copiar los archivos de la aplicación Laravel al contenedor
COPY . /app
# Instalar las dependencias de Laravel
RUN composer install
# Usar php.ini de desarrollo
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
# Configurar permisos   
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
# Exponer el puerto 80
EXPOSE 80