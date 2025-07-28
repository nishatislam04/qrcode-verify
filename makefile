.PHONY: artisan migrate migrate-fresh migrate-refresh rollback seed tinker cache-clear composer-install npm-install npm-dev npm-build

PHP_CONTAINER = qrcode-php-fpm-1

# for  now it stay like this, we will update it later again
dev:
	docker compose -f compose.dev.yaml up --build

down:
	docker compose -f compose.dev.yaml down

prod:
	docker compose -f compose.prod.yaml up --build

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

flush:
	@echo "⚠️  Flushing Docker containers, volumes, images..."
	@docker-compose down --volumes --remove-orphans
	@docker system prune --all --volumes --force
	@docker builder prune --all --force
	@docker volume prune --force
	@docker image prune --all --force
	@echo "✅ Docker reset complete. You now have a clean slate."

flush-hard:
	@echo "⚠️  HARD FLUSH: Deleting .next/, node_modules/, Docker cache..."
	@docker-compose down --volumes --remove-orphans
	@docker system prune --all --volumes --force
	@docker builder prune --all --force
	@docker volume prune --force
	@docker image prune --all --force
	@rm -rf .next node_modules pnpm-lock.yaml yarn.lock package-lock.json
	@rm -rf docker/development/workspace/node_modules
	@echo "🧹 Hard cleanup done. Please run \`make build\` again."
