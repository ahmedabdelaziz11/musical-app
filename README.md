## Introduction

musical app is platform that artists and musical venues can use to find each other, and discover new music shows.


## Perquisites
PHP + v8.1 <br />
Laravel + v8 

## getting started steps


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
php artisan key:generate;
php artisan migrate --seed;
php artisan serve;
```

6. open your browser and open the following link

<http://localhost:8000/>


## any notes
{{url}} = http://localhost:8000/ <br />

to get all artists and search by name (optinal)<br />
{{url}}/api/artists/{anyname} <br />

to get artist by id <br />
{{url}}/api/artist/{id} <br />

to create new artist <br />
{{url}}/api/artists?name=test&about=test <br />
name and about is required <br />

to update artist <br />
{{url}}/api/artists/{id}?name=test&about=test <br />
name and about is required and id must be valid<br />

to delete artist <br />
{{url}}/api/artist/{id} <br />
id must be valid<br />
<br />
<br />
to get all venues and search by name (optinal)<br />
{{url}}/api/venues/{anyname} <br />

to get venue by id <br />
{{url}}/api/venue/{id} <br />

to create new venue <br />
{{url}}/api/venues?name=test&address=test&about=test <br />
name,address and about is required <br />

to update venue <br />
{{url}}/api/venues/{id}?name=test&address=test&about=test  <br />
name,address and about is required and id must be valid<br />

to delete venue <br />
{{url}}/api/venue/{id} <br />
id must be valid<br />

<br />
<br />
to get all shows and search by title (optinal)<br />
{{url}}/api/venues/{anytitle?} <br />

to get show by id <br />
{{url}}/api/show/{id} <br />

to create new show <br />
{{url}}/api/shows?title=test&date=2023-02-26 22:53:32&artist_id=8&venue_id=6 <br />
title,date,artist_id and venue_id is required <br />

to update show <br />
{{url}}/api/shows/{id}?title=test&date=2023-02-26 22:53:32&artist_id=8&venue_id=6  <br />
title,date,artist_id and venue_id is required and id must be valid<br />

to delete show <br />
{{url}}/api/show/{id} <br />
id must be valid<br />