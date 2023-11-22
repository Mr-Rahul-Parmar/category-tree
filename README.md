This project runs with Laravel version 8.

Getting started
Assuming you've already installed on your machine: PHP (>= 7.0.0), Laravel and Composer

# install dependencies
composer install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

php artisan serve
The Laravel sample project is now up and running! Access it at http://localhost:8000.