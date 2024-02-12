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
	docker-compose exec php sh -c "cd /var/www/html && composer update"
create-table:
	docker-compose exec php sh -c "cd /var/www/html && php artisan make:migrate"
migrate:
	docker-compose exec php sh -c "cd /var/www/html && php artisan migrate"
data:
	docker-compose exec php sh -c "cd /var/www/html && php artisan migrate"
	docker-compose exec php sh -c "cd /var/www/html && php artisan db:seed"