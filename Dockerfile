FROM php:7.4.11-cli-alpine3.11

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

RUN addgroup -S app --gid=$GROUP_ID && adduser --uid=$USER_ID -S -G app app
USER app

VOLUME /app
WORKDIR /app
