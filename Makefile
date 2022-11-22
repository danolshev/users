SHELL=/bin/bash

$(shell cp -n .env.example .env)
include .env
export $(shell sed 's/=.*//' .env)

UID := $(shell id -u)
PWD := $(shell pwd)

start: install-backend up migrate

install-backend:
	docker run --rm -it -v ${PWD}:/app -u ${UID}:${UID} composer/composer:2.3.9 install --no-interaction --optimize-autoloader --ignore-platform-reqs
migrate:
	${PWD}/vendor/bin/sail php artisan migrate
pint:
	${PWD}/vendor/bin/sail pint --test
up:
	${PWD}/vendor/bin/sail up -d
down:
	${PWD}/vendor/bin/sail down
test:
	${PWD}/vendor/bin/sail php artisan test
