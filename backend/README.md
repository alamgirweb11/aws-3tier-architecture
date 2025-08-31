<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# AWS 3-Tier Architecture Backend

## Setup

### Requirements
- PHP ≥ 8.2
- Composer ≥ 2.5
- MySQL ≥ 8.0 (or any supported DB)
- Node.js & NPM (only if using Laravel Mix/Vite for assets, not required for API only)

### 1. Clone the repository
```bash
git clone repo-url
cd your-project-name
```

### 2. Install dependencies
```bash
composer install
```
### 3. Create .env file
```bash
cp .env.example .env
```

### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Set up database
#### Edit .env with your DB credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run migrations and seeders
```bash
php artisan migrate --seed
```

### 7. Run the development server
```bash
php artisan serve
```

### API Endpoints

| Method | Endpoint             | Description         |
|--------|----------------------|---------------------|
| GET    | `/api/authors`       | Get all authors     |
| POST   | `/api/authors`       | Create new author   |
| GET    | `/api/authors/{id}`  | Get a single author |
| PUT    | `/api/authors/{id}`  | Update author       |
| DELETE | `/api/authors/{id}`  | Delete author       |
