# Use an official PHP image with Apache
# Replace 8.2 with your specific PHP version if different
FROM php:8.2-apache

# Install system dependencies (example: git for composer, zip/unzip)
# Add any other system dependencies your app might need
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install common PHP extensions
# Add or remove extensions based on your application's requirements
# Examples: pdo_mysql for MySQL, gd for image processing, intl for internationalization
RUN docker-php-ext-install pdo pdo_mysql mysqli
# RUN docker-php-ext-install gd intl zip bcmath

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy composer files
COPY composer.json composer.lock ./

# Install Composer dependencies
# --no-dev: Skips installing packages listed in require-dev
# --optimize-autoloader: Optimizes the Composer autoloader for production
# --no-interaction: Do not ask any interactive questions
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy the rest of the application code
COPY . .

# Enable Apache mod_rewrite (common for frameworks/clean URLs using .htaccess)
RUN a2enmod rewrite

# Change ownership of the application files to the web server user
# This prevents potential permission issues
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Apache default)
EXPOSE 80

# The default apache2-foreground command is usually sufficient
# It's inherited from the base image 