# Mobdie

[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/digiton-ma/mobdie/pint.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/digiton-ma/mobdie/actions?query=workflow%3A"pint"+branch%3Amaster)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/digiton-ma/mobdie/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/digiton-ma/mobdie/actions?query=workflow%3Arun-tests+branch%3Amain)

## About the app
Mobdie Educational Center's website.

## Requirements

// ---

## Installation

1- Install the necessary packages
```bash
$ composer install
```

2- Copy the `.env.example` file to `.env`
```bash
$ cp .env.example .env
```

3- Generate the application key
```bash
$ php artisan key:generate
```

4- Configure you `database` information

5- run the migrations
```bash 
$ php artisan migrate --seed
```
or
```bash 
$ php artisan migrate:fresh --seed
```
6- Link your storage folder
```bash
$ php artisan storage:link
```

7- Install the necessary node packages
```bash
$ npm install
```

8- Build the assets
```bash
$ npm run build
```

9- Serve the application
```bash
$ php artisan serve
```

#### All the commands
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
npm install
npm run build
php artisan migrate --seed
php artisan serve
```
