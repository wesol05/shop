## Start

`docker-compose up -d`

## Bootstrap

`docker-compose exec app sh -c 'php artisan migrate -n'`

## Test 

```
curl -X POST --location "http://localhost:8080/api/products" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d "{
\"name\": \"name\",
\"price\": 284
}"
```
