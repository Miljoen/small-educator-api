FROM composer
COPY . /app
COPY docker.env /app/.env

# install mysql extensions for php
RUN docker-php-ext-install mysqli pdo_mysql

# install laravel and other project dependencies
RUN composer install

# generate the key to be placed in .env
RUN php artisan key:generate

# set command upon launching container
CMD [ "php", "artisan", "serve" ]

# don't forget to run `php artisan migrate` & `php artisan db:seed`!