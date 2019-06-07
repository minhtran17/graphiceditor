ifndef env
	env=dev
endif
up: dotenv
	docker-compose -f docker/env/$(env).yml up --build -d
stop:
	docker-compose -f docker/env/$(env).yml stop
down:
	docker-compose -f docker/env/$(env).yml down
dotenv:
	cp config/.env.$(env) config/.env
