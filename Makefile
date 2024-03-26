docker-run := docker-compose run --rm
php-container := $(docker-run) php-fpm
console := $(php-container) bin/console

dependencies:
	$(php-container) composer install

console: vendor
	$(console)

# Cache
clear-cache: vendor
	$(console) cache:clear

# Database
set-database: create-db migrate fixtures
create-db: vendor
	$(console) doctrine:database:drop --force --if-exists
	$(console) doctrine:database:create
migrate: vendor	
	$(console) doctrine:migration:migrate --no-interaction
generate-migration: vendor	
	$(console) make:migration --no-interaction
validate-schema: vendor
	$(console) doctrine:schema:validate
fixtures:
	$(console) doctrine:fixtures:load --no-interaction
# Database - test
set-db-test: vendor
	$(console) doctrine:database:drop --env=test --force --if-exists
	$(console) doctrine:database:create --env=test
	$(console) doctrine:schema:update --env=test --dump-sql --force
	$(console) doctrine:fixtures:load --env=test --no-interaction

# Coding Standards
coding-standard: vendor
	$(php-container) vendor/bin/php-cs-fixer fix src && vendor/bin/php-cs-fixer fix tests

# Static analysis
static-analysis: analysis dependance-violation
analysis: vendor
	$(php-container) vendor/bin/phpstan analyse -c phpstan.dist.neon
dependance-violation: vendor
	$(php-container) vendor/bin/deptrac analyse

# Tests
unit-tests: vendor
	$(php-container) bin/phpunit

full-setup-and-checking: full-setup full-checking
full-setup: dependencies clear-cache set-database set-db-test
full-checking: clear-cache coding-standard static-analysis unit-tests

# Debug
debug-autowiring: vendor
	$(console) debug:autowiring

php-ext:
	$(php-container) php -m
