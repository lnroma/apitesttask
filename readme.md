# Laravel PHP Framework

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
## run unit test
./vendor/bin/phpunit // in root project directory
