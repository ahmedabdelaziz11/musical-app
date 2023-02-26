## Introduction

musical app is platform that artists and musical venues can use to find each other, and discover new music shows.


## Perquisites
PHP + v8.1
Laravel + v8 

## getting started steps


## Installation

1.clone the project

```git
https://github.com/ahmedabdelaziz11/musical-app.git
```

2. Run Composer install in the project folder

```bash
composer install
```

3. Copy .env.example file in the project folder

```bash
cp .env.example .env
```


4. install mysql server

> create database with any name then edit the following in your .env file

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=user_name
DB_PASSWORD=password
```

5. Run the following command

```bash
php artisan key:generate; php artisan migrate --seed; php artisan serve;
```

6. open your browser and open the following link

<http://localhost:8000/>


## any notes

