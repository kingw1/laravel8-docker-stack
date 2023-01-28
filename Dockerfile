FROM php:8.0.3-fpm-buster

# install php extension
RUN docker-php-ext-install bcmath pdo_mysql

# install git zip
RUN apt-get update
RUN apt-get install -y git zip unzip

# install node
RUN curl -sl https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# set working directory
WORKDIR /var/www

EXPOSE 9000