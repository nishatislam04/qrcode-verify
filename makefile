dev:
	docker compose -f compose.dev.yaml up 

prod:
	docker compose -f compose.prod.yaml --build -d
