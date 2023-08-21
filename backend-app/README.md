# Exam Platform Backend

## Backend: Laravel Framework

### General

- Server `http://localhost:8080`
- Docker commands to start and finalize env
    - `docker-compose up -d`
    - `docker-compose down`
- Docker commands for the first time installation
    1. `docker-compose up -d`
    2. `docker-compose exec composer install`
    3. `docker-compose exec chown -R www-data:www-data /var/www/html/storage/`
- Use `php artisan migrate` to mount database
- Use `docker-compose exec` before operations commands in app dir or just `docker exec -it <conteiner_id> bash` to full access.

### Development

#### Authentication

A autenticação está implementada no backend.