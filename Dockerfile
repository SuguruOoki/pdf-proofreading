FROM php:8.2.3-apache
ENV ROOT=/var/www/html
WORKDIR ${ROOT}
# composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer
# git install
RUN apt-get update && apt-get install -y git libzip-dev zlib1g-dev zip unzip && docker-php-ext-install zip
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini && \
	sed -i 's/upload_max_filesize = 20M/upload_max_filesize = 128M/g' /usr/local/etc/php/php.ini