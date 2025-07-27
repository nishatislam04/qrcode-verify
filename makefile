.PHONY: artisan migrate migrate-fresh migrate-refresh rollback seed tinker cache-clear composer-install npm-install npm-dev npm-build

PHP_CONTAINER = qrcode-php-fpm-1

dev:
	docker compose -f compose.dev.yaml up 

prod:
	docker compose -f compose.prod.yaml --build -d

migrate:
	docker exec $(PHP_CONTAINER) php artisan migrate

migrate-fresh:
	docker exec $(PHP_CONTAINER) php artisan migrate:fresh

migrate-refresh:
	docker exec $(PHP_CONTAINER) php artisan migrate:refresh

rollback:
	docker exec $(PHP_CONTAINER) php artisan migrate:rollback

seed:
	docker exec $(PHP_CONTAINER) php artisan db:seed

tinker:
	docker exec -it $(PHP_CONTAINER) php artisan tinker

# make artisan cmd="make:model QrCode -mfs"
artisan:
	docker exec -it $(PHP_CONTAINER) php artisan $(cmd)

cache-clear:
	docker exec $(PHP_CONTAINER) php artisan config:clear
	docker exec $(PHP_CONTAINER) php artisan route:clear
	docker exec $(PHP_CONTAINER) php artisan view:clear	

composer-install:
	docker exec $(PHP_CONTAINER) composer install

npm-install:
	npm install

npm-build:
	npm run build
