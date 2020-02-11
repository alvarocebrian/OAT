FROM ubuntu:18.04

RUN ln -fs /usr/share/zoneinfo/Europe/Madrid /etc/localtime

# Basic packages
RUN apt-get update && apt-get install -y \
    curl \
    git \
    iputils-ping \
    nano \
    zip

RUN apt-get install -y \
    php \
    php-fpm \
    php-xml \
    php-mbstring

# Add composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Add php7.2 configuration files
ADD etc/php/7.2/fpm/conf.d/ /etc/php/7.2/fpm/conf.d/
ADD etc/php/7.2/cli/conf.d/ /etc/php/7.2/cli/conf.d/
ADD etc/php/7.2/fpm/pool.d/www.conf /etc/php/7.2/fpm/pool.d/

RUN mkdir /run/php

EXPOSE 9000

CMD ["php-fpm7.2", "-F"]