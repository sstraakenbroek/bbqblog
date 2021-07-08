# BBQ Blog

## Installation

Be sure to close all running containers with ports connected to: 80,8080 etc.
```
docker ps
```

End process with
```
docker kill xx
```

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


Go to bbqblog directory and install all dependencies and data
```
docker exec -it laradock_workspace_1 /bin/bash -c "cd /var/www/bbqblog && composer install
cd /var/www/bbqblog && npm install
cd /var/www/bbqblog && npm run dev
cd /var/www/bbqblog && php artisan storage:link
cd /var/www/bbqblog && php artisan migrate:fresh
cd /var/www/bbqblog && php artisan db:seed
"
```  

For an example Post test

## Go to workspace
```
docker exec -it laradock_workspace_1 /bin/bash
```

```
cd bbqblog
vendor/bin/phpunit tests/Feature/PostsTest.php
```

For development start a watcher:
docker exec -it laradock_workspace_1 /bin/bash -c "cd /var/www/bbqblog && npm run watch"


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

