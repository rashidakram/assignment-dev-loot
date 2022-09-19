FROM php:8.1.10-fpm-alpine

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www/


# Install dependencies
RUN apk update && apk add --no-cache  \
            build-base\
             libpng-dev  \
              libzip-dev \
               libjpeg-turbo-dev \
                freetype-dev\
                musl-locales  \
                 zip \
                 jpegoptim optipng pngquant gifsicle \
   && apk add --no-cache --virtual .build-deps \
              libmcrypt-dev openssl-dev \
                autoconf \
                 vim \
                 unzip \
                 git \
                curl


# Clear cache

RUN rm -rf /var/cache/apk/*

# Install extensions
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql

# Install composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# RUN chmod +x /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY . .

# install all PHP dependencies
RUN cd /var/www/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer update
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
