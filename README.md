<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Searchable Tests

This is a simple project to test the Laravel Searchable package.

## Dataset

The dataset is a list of a thousand users created with the `UserFactory` class.



## Installation

1. Clone the repository
2. Run `composer install`
3. Run `php artisan sail:install`
4. Run `./vendor/bin/sail up -d`
5. Run `./vendor/bin/sail artisan migrate:fresh --seed`

## Usage

1. Visit the `http://0.0.0.0/meilisearch` route to test the search functionality. Search for a users [daniele, enrico, umberto, marco].
2. Visit the local **Meilisearch** homepage http://0.0.0.0:7700/

## Commands

1. `./vendor/bin/sail artisan scout:delete-all-indexes` - Delete all indexes
2. `./vendor/bin/sail artisan scout:import` - Import all models to the search engine
3. `./vendor/bin/sail artisan scout:flush` - Flush the search engine

### Database Seeder

1. `./vendor/bin/sail artisan migrate:fresh --seed` - Drop the database and seed it with 1000 users
