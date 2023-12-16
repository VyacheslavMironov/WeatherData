docker-compose exec db /bin/bash
psql -U raptor
create database open_weather_map_db;
docker-compose run artisan migrate
docker-compose run artisan queue:work
docker-compose run artisan schedule:work
docker-compose run artisan app:weather-reader-command