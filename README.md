# ecommerce-api

Clone the repo (like any other) : 

``` git clone ... ```
``` cd ... ```

Run the containers :

``` docker-compose up -d ```

Install dependencies, create db and load fixtures :

``` make full-setup ```

Access the API documentation here : http://localhost/

Run tests, static analysis and cs fix

``` make checking ```

See the Makefile for other commands. 
In any cases, you can run your command from the root directory
and inside the container : 

``` docker-compose run --rm php-fpm [yourcommand] ```
