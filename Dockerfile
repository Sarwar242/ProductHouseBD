# Use PHP 7.2 FPM as base image
FROM php:7.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy .env.example to .env
COPY .env.example .env

# Install dependencies
RUN composer update

# Generate application key
RUN php artisan key:generate

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www

# Expose port 8000 and start PHP's built-in server
EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
