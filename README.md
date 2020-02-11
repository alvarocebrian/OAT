# Run exercise

## Start docker (requires docker & docker-compose)

```bash
cd docker
docker-compose up -d --build
```

## Install project

```bash
# Access container
docker-compose exec php bash

# Install dependencies
composer install -d /var/www/

# Change permissions
chown www-data:www-data -R /var/www
```

## Run in browser

The endpoint is at
```
http://localhost/questions
```