#!make
##@ [Docker] Build / Infrastructure

.PHONY: up
up: ## Spin up all containers
	cp .env.example .env
	docker run --rm -v "$(PWD)":/app -w /app php:8.4-cli bash -c "apt-get update && apt-get install -y unzip && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && composer install"
	./vendor/bin/sail up -d
	./vendor/bin/sail exec app php artisan migrate
	./vendor/bin/sail exec app php artisan db:seed

.PHONY: down
down: ## Terminate all containers
	docker compose down

.PHONY: down
sh: ## Access the shell of PHP container
	./vendor/bin/sail exec -it app bash

phpstan: ## Run PHPStan
	./vendor/bin/sail exec app composer phpstan -n

pint: ## Run Pint to format code
	./vendor/bin/sail exec app composer pint -n

idehelper: ## Generate IDE Helper
	./vendor/bin/sail exec app php artisan ide-helper:generate
	./vendor/bin/sail exec app php artisan ide-helper:models --write --reset

.PHONY: help
help: ## Show help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n"} /^[a-zA-Z0-9_-]+:.*?##/ { printf "  \033[36m%-27s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)
