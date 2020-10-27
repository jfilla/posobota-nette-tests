bin=vendor/bin
chrome:=$(shell command -v google-chrome 2>/dev/null)
codeSnifferRuleset=codesniffer-ruleset.xml
configExample=app/config/local.example.neon
coverage=$(temp)/coverage/php
php=php
point=wavevision/point
src=app
temp=temp
testConsole=tests/bin/console
tests=tests
dirs:=$(src) $(tests)

all:
	 @$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' | sort | egrep -v -e '^[^[:alnum:]]' -e '^$@$$'

# Setup

init: build
	cp -n $(configExample) app/config/local.neon
	#cp -n $(configExample) tests/config/local.neon
	@echo "update configuration files as you see fit"

build: composer

composer:
	composer install

rm-cache:
	rm -rf $(temp)/cache

reset: rm-cache
	composer dumpautoload

di:
	bin/extract-services

database-create:
	$(bin)/create-database examples/config/local.neon

database-schema:
	$(examplesConsole) orm:schema-tool:create

database-fixtures:
	$(examplesConsole) examples:insert-fixtures

database-reset: reset database-create database-schema database-fixtures

fix: reset check-syntax phpcbf phpcs phpstan test

# QA

check-syntax:
	$(bin)/parallel-lint -e $(php) $(dirs)

phpcs:
	$(bin)/phpcs -sp --standard=$(codeSnifferRuleset) --extensions=php $(dirs)

phpcbf:
	$(bin)/phpcbf -spn --standard=$(codeSnifferRuleset) --extensions=php $(dirs) ; true

phpstan:
	$(bin)/phpstan analyze $(dirs) --level max

qa: check-syntax phpcbf phpcs phpstan

# Tests

test-database-create:
	$(bin)/create-database tests/config/local.neon

test-database-schema:
	$(testConsole) orm:schema-tool:create

test-database-fixtures:
	$(testConsole) tests:insert-fixtures

test-database-reset: test-database-create test-database-schema test-database-fixtures

test-reset: test-database-reset test

test:
	$(bin)/phpunit

test-coverage: reset
	$(bin)/phpunit --coverage-html=$(coverage)

test-coverage-open: test-coverage
ifndef chrome
	open -a 'Google Chrome' $(coverage)/index.html
else
	google-chrome $(coverage)/index.html
endif

ci: build yarn-ci phpcs phpstan test-database-schema test-database-fixtures test
