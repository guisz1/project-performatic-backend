up:
	docker compose up && docker-compose up
	
down:
	docker compose down && docker-compose down

php:
	docker exec -it projeto-php bash

migrate:
	docker container exec -it projeto-php php bin/hyperf.php migrate

migration:
	docker container exec -it projeto-php php bin/hyperf.php gen:migration $(name)

reset:
	docker container exec -it projeto-php php bin/hyperf.php migrate:reset

install:
	docker container exec -it projeto-php composer install $(params)

require:
	docker container exec -it projeto-php composer require $(params) $(name)