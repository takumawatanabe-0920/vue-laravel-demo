setup:
  
	@make up
	@make composer-update

build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d --build
composer-update:
	docker-compose exec my-api bash -c "cd /var/www/html && composer update"
data:
	docker-compose exec my-api bash -c "cd /var/www/html && php artisan migrate"
	docker-compose exec my-api bash -c "cd /var/www/html && php artisan db:seed"