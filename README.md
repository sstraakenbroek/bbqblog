# BBQ Blog

## Installation
```
git clone https://github.com/sstraakenbroek/bbqblog.git
```
Go to /laradock directory   
```
docker-compose build php-fpm nginx mariadb phpmyadmin mailhog workspace
```
Go to /bbqblog directory
```
composer install
npm install
npm run dev
php artisan migrate
php artisan seed
```   

## Run server
Go to laradock directory
```
docker-compose up -d nginx mariadb phpmyadmin mailhog workspace
```

## Website
http://localhost/

## PhpMyAdmin
http://localhost:8080  
Server: mariadb  
Username: root  
Password: root  

## Mailserver:
http://localhost:8025

## Workspace
Go to laradock directory
```
docker exec -it laradock_workspace_1 /bin/bash
```