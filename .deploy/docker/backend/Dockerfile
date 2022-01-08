FROM php:7.4-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y

COPY .deploy/docker/backend/entrypoint.sh /entrypoint-component.sh


EXPOSE 9000

CMD ["php-fpm", "-O", "-F"]