current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

.PHONY: build
build: deps start

.PHONY: deps
deps: composer-install

# 🐘 Composer
composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

.PHONY: composer-install
composer-install: CMD=install

.PHONY: test
test: composer-env-file
	docker exec medine-php_ddd_skeleton-todo_backend-php ./vendor/bin/phpunit --testsuite todo
	docker exec medine-php_ddd_skeleton-todo_backend-php ./vendor/bin/phpunit --testsuite shared

# 🐳 Docker Compose
.PHONY: start
start: CMD=up -d

# Usage: `make doco CMD="ps --services"`
# Usage: `make doco CMD="build --parallel --pull --force-rm --no-cache"`
.PHONY: doco
doco start stop destroy: composer-env-file
	@docker-compose $(CMD)

clean-cache:
	@rm -rf apps/*/*/var