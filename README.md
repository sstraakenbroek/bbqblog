# BBQ Blog

## Installation
```
git clone https://github.com/sstraakenbroek/bbqblog.git blog
```
Go to /laradock directory and build the containers
```
docker-compose build php-fpm nginx mariadb phpmyadmin mailhog workspace
```

## Run server
```
docker-compose up -d nginx mariadb phpmyadmin mailhog workspace
```

## Go to workspace
```
docker exec -it laradock_workspace_1 /bin/bash
```

Go to bbqblog directory and install all dependencies and data
```
composer install
npm install
npm run dev
php artisan storage:link
php artisan migrate:fresh
php artisan db:seed
```  

For an example Post test
```
cd bbqblog
vendor/bin/phpunit tests/Feature/PostsTest.php
```

## Website
http://localhost/  
Username: stefan@straakenbroek.nl  
Password: secret  

## PhpMyAdmin
http://localhost:8080  
Server: mariadb  
Username: root  
Password: root  

## Mailserver:
http://localhost:8025
