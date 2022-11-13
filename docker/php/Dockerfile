FROM php:7.4-fpm

# Copy composer.lock and composer.json
# COPY ../server/composer.lock ../server/composer.json /bless

# Set working directory
WORKDIR /bless
# RUN chmod o+r /etc/resolv.conf

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libpq-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    zip \
    exif \
    imagemagick sudo\
    curl \
    libzip-dev \
    libx11-xcb1 \
    libxrandr2 \
    libxcomposite1 \
    libxcb-dri3-0 \
    libxcursor1 libxdamage1 libxext6 libxi6 libxtst6 libnss3 libatk-bridge2.0-0 libatk1.0-0 libxss1 libdrm2 libgbm-dev libgtk-3-0 libgtk-3-0 libasound2 \
    iputils-ping




# Clear cache

RUN apt-get update \
    && apt-get -y install \
    libmagickwand-dev \
    --no-install-recommends \
    && pecl install imagick xdebug \
    && docker-php-ext-enable imagick xdebug

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
# imagemagick
RUN docker-php-ext-install mysqli pdo_mysql pdo_pgsql zip exif pcntl sockets
RUN docker-php-ext-enable mysqli pdo_mysql pdo_pgsql zip exif pcntl sockets
RUN docker-php-ext-install gd
# RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/

# RUN docker-php-ext-enable --ini-name 20-imagick.ini imagick 

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# For artisan serve
EXPOSE 8000

# You don't need to expose 9000 for FPM as it's exposed by default

CMD ["php-fpm"]