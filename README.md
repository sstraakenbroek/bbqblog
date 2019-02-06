# BBQ Blog

## Installation
```
git clone  
```
goto laradock directory   
```
docker-compose build php-fpm nginx mariadb phpmyadmin mailhog workspace
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