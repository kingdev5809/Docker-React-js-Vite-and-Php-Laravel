# Laravel + React (Vite) - Docker Development Setup

## 1️⃣ Install Dependencies

Ensure **Docker** and **Docker Compose** are installed:

```sh
docker --version
docker-compose --version
```

## 2️⃣ Create `.env` Files

### Backend (`api/.env`)

```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=e_navbatchi
DB_USERNAME=root
DB_PASSWORD=1111
```

Generate the application key:

```sh
docker-compose exec backend php artisan key:generate
```

## 3️⃣ Project Structure

```
/project-root
│── api/          # Laravel Backend
│── spa/          # React Frontend (Vite)
│── docker-compose.yml
│── Dockerfile.dev
│── spa/Dockerfile.dev
```

## 4️⃣ Start the Containers

```sh
docker-compose -f up --build -d
```

# If for Production

```sh
docker-compose -f docker-compose.prod.yml up --build -d
```

Check running containers:

```sh
docker ps
```

## 5️⃣ Verify Services

### Backend (`http://localhost:8000`)

Check logs:

```sh
docker-compose logs backend
```

Run migrations:

```sh
docker-compose exec backend php artisan migrate
```

### Frontend (`http://localhost:3030`)

Check logs:

```sh
docker-compose logs frontend
```

### Database (MySQL - Port 3317)

Connect via MySQL client:

```sh
docker-compose exec mysql mysql -u root -p
```

Enter password: `1111`

## 6️⃣ Debugging & Common Commands

### Restart Containers

```sh
docker-compose -f docker-compose.dev.yml restart
```

### Stop & Remove Containers

```sh
docker-compose down -v
```

### Access Backend Container

```sh
docker-compose exec backend sh
```

### Run Laravel Commands

```sh
docker-compose exec backend php artisan cache:clear
docker-compose exec backend php artisan migrate --seed
docker-compose exec backend php artisan route:list
```

### Generate Swagger API Docs

```sh
docker-compose exec backend php artisan l5-swagger:generate
```

Docs available at: `http://localhost:8000/api/documentation`

### Reinstall Frontend Dependencies

```sh
docker-compose exec frontend sh -c "npm install && npm run dev -- --host"
```

Now your **Laravel + React (Vite)** project is running with Docker in **development mode**. 🚀
