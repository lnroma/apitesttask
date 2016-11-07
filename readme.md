# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Install

1. git clone https://github.com/lnroma/apitesttask.git

2. install composer.phar if not exist https://getcomposer.org/download/

3. php composer.phar install

4. setup database settings in file .env

4. php artisan migrate:install

5. php artisan serve 

6. visit to localhost:8000

## Documentation for api

1. Create new user http://localhost:8080/api/v1/registration?name=[name user]&email=[email]&password=[password]
   Response success example:
   
   `````
   {"code":200,"message":"User created success full. You can login by method \"login\" method"}
   `````
   
   Response fail example:
   
   `````
   {"code":500,"errors":{"email":["The email has already been taken."]}}
   `````
   
2. login action localhost:8080/api/v1/login?email=testing@mailforspam.com&password=testing@mailforspam.com
   
   Response success example:
   
   `````
   {"code":200,"message":"Your login","apiKey":"TeIoTzHlrlBMl1JiDk172DlwYTkC1EIFADYerMY6"}
   `````
   
   Response fail example:
   
   `````
   {"code":500,"errors":{"auth":"This user or password is not exists"}}
   `````

