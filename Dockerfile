FROM php:8.2-apache

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    unzip \
    mc \
    nmap \
    wkhtmltopdf \
    wget \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

RUN pecl install redis && docker-php-ext-enable redis

COPY ./docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN a2enmod rewrite

COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands

ENV TZ=America/Argentina/Buenos_Aires
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Set working directory
WORKDIR /var/www
