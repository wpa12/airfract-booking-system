# Flight Booking System

- Introduction
- Setup
    - Initiation
    - Migrations
    - Seeders
- Models
- Controllers
- Services
- Enums
- Abstracts
- Contracts


## Introduction

This is a Laravel project allows for the creation and booking of aircraft from flight schools based across multiple airports. There are two user types created, an admin user, and a general user.

I did not feel that there was a need right now to create individual admin users perflight school for purposes of keeping the project a bit simpler.


## Setup

### Initiation
- Clone repo
- `cd [path_to]/aircraft-booking-system`
- Run composer install
- Run npm install
- Copy the .env.example to .env `cp .env.example .env`
- Run `php artisan key:generate`
- Run `./vendor/bin/sail up -d` to run laravel sail

### Migrations
Run inside your IDE terminal `sail artisan migrate`

### Seeders
Run `sail artisan db:seed - this will run the DatabaseSeeder which calls on a number of other seeders (Seeder Documentation is [here](./database/seeders/README.md))