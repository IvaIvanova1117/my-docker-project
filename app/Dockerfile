FROM php:8.2-cli
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /usr/src/app
COPY script.php .
CMD [ "php", "./script.php" ]


