<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Game Guru

A videogame blog app built in Laravel and just with Docker

## Run the App

1. First you need to have installed [Docker](https://www.docker.com)

2. Install composer dependencies

```bash
docker run --rm -v $(pwd):/app composer install
```
3. Once __vendor__ folder its filled copy

```bash
cp .env.example .env
```
4. Start docker services

```bash
./vendor/bin/sail up -d
```
5. Install node dependencies

```bash
./vendor/bin/sail npm i
```
6. Generate your app key with artisant 

```bash
./vendor/bin/sail php artisan key:generate
```

7. Run Vite

```bash
./vendor/bin/sail npm run dev
```
Congratulation if everything goes well you can see the app running [here](http://localhost)

### Running migration
1. to create migration
```bash php artisan make:migration create_<table name>_table
./vendor/bin/sail php artisan migrate
```
2. to run migrations
```bash
./vendor/bin/sail php artisan migrate
```
3. to reset migrations
```bash
./vendor/bin/sail php artisan migrate:reset
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
