ssh:
	docker exec -u www-data -it kvak_app /bin/bash

up:
	docker-compose up -d
