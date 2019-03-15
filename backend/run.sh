#!/bin/bash

echo Subindo container docker 
docker-compose up -d

echo Copiando .env
docker exec -it uds-app cp .env.example .env

echo instalando dependencias
docker exec -it uds-app composer install

echo Gerando key
docker exec -it uds-app php artisan key:generate

echo Executando as migrations
docker exec -it uds-app php artisan migrate

echo Containers em execucao
docker ps -a 