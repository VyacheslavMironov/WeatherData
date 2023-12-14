docker-compose exec db /bin/bash
psql -U raptor
create database open_weather_map_db;
docker-compose run artisan migrate