FROM component/php
LABEL maintainer="chenwu <jiangwu10057@qq.com>" version="0.1"
WORKDIR /home/www

RUN apt-get -y update && \
    apt-get -y install unzip zip && \
    docker-php-ext-install pcntl && \
    echo "swoole.use_shortname = 'Off'" >> /usr/local/etc/php/conf.d/docker-php-ext-swoole.ini && \
    docker-php-ext-enable swoole && \
    docker-php-ext-enable redis

EXPOSE 9501
ENTRYPOINT ["composer","start"]