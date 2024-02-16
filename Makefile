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
composer-require:
	docker-compose exec composer sh -c "cd /var/www/html && composer require $(package)"
create-migration:
	docker-compose exec php sh -c "cd /var/www/html && php artisan make:migration $(migration_name) --create=$(table_name)"
update-migration:
  # make migrate migration_name=create_tasks_table table_name=tasks
	docker-compose exec php sh -c "cd /var/www/html && php artisan make:migration $(migration_name) --table=$(table_name)"
migrate:
	docker-compose exec php sh -c "cd /var/www/html && php artisan migrate"
model:
  # ex make model name=Task
	docker-compose exec php sh -c "cd /var/www/html && php artisan make:model $(name)"
data:
	docker-compose exec php sh -c "cd /var/www/html && php artisan migrate"
	docker-compose exec php sh -c "cd /var/www/html && php artisan db:seed"