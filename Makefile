up:
	docker compose up -d
build:
	docker compose build --no-cache --force-rm
work:
	docker compose exec app bash
db:
	docker compose exec mysql bash
stop:
	docker compose stop
install:
	cp .env.example .env
	@make build
	@make up
	docker compose exec app composer install
	docker compose exec app yarn install
	docker compose exec app yarn
	docker compose exec app yarn run dev
	docker compose exec app php artisan key:generate
	@make migrate
reinstall:
	@make destroy
	@make install
down:
	docker compose down
restart:
	@make down
	@make up
ps:
	docker compose ps
dev:
	docker compose exec app yarn run dev
local:
	docker compose exec app php artisan serve --host 0.0.0.0 --port 8081
test:
	docker compose exec app ./vendor/bin/phpunit --testdox
migrate:
	docker compose exec app php artisan migrate
fresh:
	docker compose exec app php artisan migrate:fresh --seed
tinker:
	docker compose exec app php artisan tinker