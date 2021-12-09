FROM php:7.2-apache

WORKDIR /var/www

RUN apt-get update

# 1. development packages
RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

# 2. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

# 4. start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    mbstring \
    pdo_mysql \
    zip

# 5. composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


COPY . /var/www/


COPY --chown=www-data:www-data . /var/www/
RUN chown -R www-data:www-data /var/www/
RUN chown -R www-data:www-data /var/www/storage
RUN chown -R www-data:www-data /var/www/bootstrap
RUN chown -R www-data:www-data /var/www/public
RUN chmod -R 755 /var/www/
RUN chmod -R 755 /var/www/storage
RUN chmod -R 755 /var/www/bootstrap
RUN chmod -R 755 /var/www/public

RUN composer install

COPY .env.example /var/www/.env
RUN chown -R www-data:www-data /var/www/.env
RUN chmod -R 755 /var/www/.env

EXPOSE 9000

# 6. we need a user with the same UID/GID with host user
# so when we execute CLI commands, all the host file's ownership remains intact
# otherwise command from inside container will create root-owned files and directories
ARG uid=1000
USER www-data
# RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
# RUN mkdir -p /home/devuser/.composer && \
#     chown -R devuser:devuser /home/devuser
