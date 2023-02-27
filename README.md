
# Project Title

musical app is platform that artists and musical venues can use to find each other, and discover new music shows.


## Perquisites
- PHP version +8.1

- Laravel version +8

- Mysql server

- Git 
## getting started steps

To deploy this project run

1- Clone the project for github 
```bash
git clone https://github.com/ahmedabdelaziz11/musical-app.git
```
2. Move to the project folder 
        
```bash
cd musical-app
```

3. Run Composer install in the project folder

```bash
composer install
```

4. Copy .env.example file in the project folder

```bash
cp .env.example .env
```
5. open mysql server
> create database with any name then edit the following in your .env file

```env
DB_DATABASE=database_name
DB_USERNAME=user_name
DB_PASSWORD=password
```

6. Run the following commands in same sequence

```bash
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

7. open open the following link

<http://localhost:8000>

## API Reference

#### Get all artists and search by name(optinal)

```http
  GET /api/artists
  GET /api/artists/${anyname}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `anyname` | `string` | **Optinal**. Search input |

#### Get item

```http
  GET /api/artist/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required**. Id of artist to fetch |

#### Create new artist

```http
    POST /api/artists?name=test&about=test
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. name of artist |
| `about`     | `string` | **Required**. about value |

#### Update artist

```http
    PUT /api/artists/${id}?name=test&about=test
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`        | `number` | **Required**. artist id number    |
| `name`      | `string` | **Required**. new name of artist  |
| `about`     | `string` | **Required**. new about value     |

#### Delete artist

```http
    DELETE /api/artists/${id}?name=test&about=test
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`        | `number` | **Required**. artist id number    |
| `name`      | `string` | **Required**. new name of artist  |
| `about`     | `string` | **Required**. new about value     |

#### Get all venues and search by name(optinal)

```http
    GET /api/venues/${anyname}
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `anyname`      | `string` | **Optinal**. new name of artist|


#### Get venue by id

```http
    GET /api/venue/${id}
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`   | `number` | **Required**. venue id number          |

#### Create new venue

```http
    POST /api/venues?name=test&address=test&about=test
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `name`   | `number` | **Required**. venue id number          |
| `address`| `string` | **Required**. venue id number          |
| `about`  | `string` | **Required**. venue id number          |

#### Update venue

```http
    PUT /api/venues/${id}?name=test&address=test&about=test
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`     | `number` | **Required**. venue id number          |
| `name`   | `string` | **Required**. venue id number          |
| `address`| `string` | **Required**. venue id number          |
| `about`  | `string` | **Required**. venue id number          |

#### Delete venue

```http
    DELETE /api/venue/${id}
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`     | `number` | **Required**. venue id number        |

#### Get all shows and search by title(optinal)

```http
    GET /api/venues/${anytitle}
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `anytitle`     | `string` | **Optinal**. anytitle for search      |

#### Get show by id

```http
    GET /api/show/${id}
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`     | `number`    | **Required**. show id             |


#### Create new show

```http
    POST /api/shows?title=test&date=2023-02-26 22:53:32&artist_id=8&venue_id=6
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `title`     | `number` | **Required**. show id             |
| `date`      | `number` | **Required**. show id             |
| `artist_id` | `number` | **Required**. show id             |
| `venue_id`  | `number` | **Required**. show id             |

#### Update show

```http
    PUT /api/shows/${id}?title=test&date=2023-02-26 22:53:32&artist_id=8&venue_id=6
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`        | `number` | **Required**. show id             |
| `title`     | `number` | **Required**. show id             |
| `date`      | `number` | **Required**. show id             |
| `artist_id` | `number` | **Required**. show id             |
| `venue_id`  | `number` | **Required**. show id             |

#### Delete show

```http
    DELETE /api/show/${id}
```

| Parameter   | Type     | Description                       |
| :--------   | :------- | :-------------------------------- |
| `id`        | `number` | **Required**. show id             |


