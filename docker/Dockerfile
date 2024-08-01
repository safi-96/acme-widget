FROM php:8.0-cli

# Set working directory
WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y git unzip
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install

# Run PHPStan
RUN vendor/bin/phpstan analyse

# Command to run tests
CMD ["php", "vendor/bin/phpunit", "tests"]
