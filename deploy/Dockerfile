FROM component/phpfpm
LABEL maintainer="chenwu <jiangwu10057@qq.com>" version="0.1"
WORKDIR /home/www

RUN RUN sed -i "s@https://mirrors.aliyun.com@http://mirrors.tencent.com@g" /etc/apt/sources.list && \
    apt-get -y update && \
    apt-get -y install unzip zip && \
    echo "swoole.use_shortname = 'Off'" >> /usr/local/etc/php/conf.d/docker-php-ext-swoole.ini && \
    docker-php-ext-enable swoole && \
    docker-php-ext-enable redis

EXPOSE 9501
ENTRYPOINT ["composer","start"]