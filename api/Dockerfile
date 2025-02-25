# Используем PHP 8.2 + FPM
FROM php:8.2-fpm

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Обновляем пакеты и устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    zip unzip curl \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring gd zip \
    && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем код приложения
COPY . .

# Устанавливаем зависимости проекта
RUN composer install --no-dev --optimize-autoloader

# Устанавливаем права
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Открываем порт PHP-FPM
EXPOSE 9000

# Запускаем PHP-FPM
CMD ["php-fpm"]
