# Portfolio 2.0

Portfolio 2.0 is a portfolio I build for my self to showcase the project I've worked on. You're free to use it as long 
as you keep the credit.

* [Requirements](#requirements)
* [Installation](#installation)
* [Configuration](#configuration)
* [Tests](#tests)
* [Contributors](#contributors)

## Requirements
* PHP >= 7.2.0
* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Installation
First, download the project using Git:
`git clone git@github.com:jean8mathieu/portfolio2.0.git`

You'll need to run the following commands:
* `php artisan key:generate`
* `composer install`
* `npm install` (Linux & Mac) or `npm install --no-bin-links` (Windows)
* `php artisan migrate`

## Configuration
There's 2 choices, if you would like to insert dummy data you can run the following command:  
`php artisan db:seed --class=DevelopmentSeeder` (Will create user, projects and tags)

The other choice is if you want to use this on a production server:   
`php artisan db:seed --class=DatabaseSeeder` (Will insert usual programming languages used)

## Tests
At this moment there's no PHPUnit test done. But when there will, instruction will be added.

## Contributors
* [jean8mathieu](https://github.com/jean8mathieu)
