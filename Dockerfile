# Use an official PHP image with Apache
FROM php:8.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install required PHP extensions and system dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy application code into the container
COPY . /var/www/html

# Set the appropriate permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for the Apache server
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
