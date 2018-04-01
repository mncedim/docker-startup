FROM php:5.6-apache

MAINTAINER Mncedi M <mncedim@gmail.com>
    
# Install all the typical requirements for a PHP env
RUN apt-get update && apt-get upgrade -y && apt-get autoremove -y \
    && apt-get install -y git libmcrypt-dev libpng12-dev libjpeg-dev libpq-dev libfreetype6-dev mysql-client curl \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr --with-freetype-dir=/usr \
    && docker-php-ext-install mcrypt gd mbstring pdo pdo_mysql zip mysqli iconv bcmath \
    && pecl install xdebug-2.5.5 \
    && rm -rf /tmp/pear \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    
# Install sSMTP for mail support
RUN apt-get update && apt-get install -y -q --no-install-recommends \
    ssmtp \
	&& apt-get clean \
	&& rm -r /var/lib/apt/lists/*
    
# Install imap
RUN apt-get update && apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

# Enable mod rewrite
RUN a2enmod rewrite expires
RUN a2enmod ssl
