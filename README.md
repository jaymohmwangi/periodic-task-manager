# periodic-task-manager

## How to Run periodic-task-manager on Production

This guide will walk you through the steps required to set up and run a periodic-task-manager app on a production environment. This app allows users to create periodic tasks and manage them, defining their frequency and duration, and grouping them into task groups. It also displays pending tasks in a list organized by date, allowing users to mark them as completed. The app is built with Laravel, Livewire, and Tailwind.

## Prerequisites
Before you begin, make sure you have the following:

- A web server (e.g., Apache, Nginx)
- PHP 7.3 or later
- Composer
- MySQL or another supported database

## Installation

Clone the repository to your web server:
```bash
  git clone https://github.com/jaymohmwangi/periodic-task-manager.git
  cd periodic-task-manager
```

Install dependencies using Composer:
```bash
composer install  --optimize-autoloader
```

Copy the .env.example file to .env 
```bash
cp .env.example .env
```
Update the database connection env variables:
```bash
DB_CONNECTION=pgsql
DB_HOST=
DB_PORT=25060
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Generate a new application key:
```bash
php artisan key:generate
```
Run database migrations and seed the database:
```bash
php artisan migrate --seed
```

## Running Unit Tests
Ensure that PHPUnit is installed on your system. If not, you can install it using Composer:
```bash
composer require --dev phpunit/phpunit
```
Run the unit tests:
Run Test for Task Service
```bash
php artisan test --filter TaskServiceTest
```
Test For TaskServiceTest Include:
  - ✓ create task
  - ✓ update task
  - ✓ task find by id
  - ✓ get all tasks
  - ✓ delete task
  - ✓ it determines task time group based on due date
  - ✓ it marks task as completed and recreates task based on frequency
  - ✓ get due date

Run Test for Task Group Service
```bash
php artisan test --filter TaskGroupServiceTest
```
Test For TaskGroupServiceTest Include:
  - ✓ create task group
  - ✓ update task group
  - ✓ delete task group
  - ✓ get all task groups
  - ✓ get task group by id
You can clear all test data from your database by running:
```bash
php artisan migrate:fresh
```
To create default users in the database, you can run:
```bash
php artisan db:seed
```
## Running the App
Start the app using the built-in PHP web server:
```bash
php artisan serve --env=production
```
Open the app in your browser:
```bash
http://localhost:8000
```
Congratulations! You have successfully set up and run a Laravel Jetstream app on a production environment.
