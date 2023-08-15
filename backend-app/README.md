# Exam Platform Backend

### Laravel Framework
- Server `http://localhost:8080`
- Docker commands to start and finalize env
    - `docker-compose up -d`
    - `docker-compose down`
- Docker commands for first time installation
    1. `docker-compose up -d`
    2. `docker-compose exec composer install`
    3. `docker-compose exec chown -R www-data:www-data /var/www/html/storage/`