<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Game Guru Help

A videogame blog app built in Laravel and just with Docker

## Commands

Util commands to work with Laravel

### Migrations

* Create migration
```bash 
./vendor/bin/sail php artisan make:migration create_table_images --create=images
```

* Run all migrations
```bash
./vendor/bin/sail php artisan migrate
```

* Remove migrations
```bash
./vendor/bin/sail php artisan migrate:reset
```

### Models

* Create a model
```bash
./vendor/bin/sail php artisan make:model Role
./vendor/bin/sail php artisan make:model Category
```

### Factories
* Create Factory
```bash
./vendor/bin/sail php artisan make:factory RoleFactory --model=Role
./vendor/bin/sail php artisan make:factory RoleFactory --model=Category
```

### Seeders
* Create seeder
```bash
./vendor/bin/sail php artisan make:seeder RolesTableSeeder
./vendor/bin/sail php artisan make:seeder CategoriesTableSeeder
```

* Execute Seeder
```bash
./vendor/bin/sail php artisan db:seed --class=RolesTableSeeder
./vendor/bin/sail php artisan db:seed --class=CategoriesTableSeeder

```
### Controllers

* Create controller:
```bash
./vendor/bin/sail php artisan make:controller RoleController
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
