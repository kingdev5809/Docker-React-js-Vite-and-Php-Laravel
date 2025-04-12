# Laravel + React (Vite) - Optimized Docker Setup

## 1️⃣ Install Dependencies

Ensure **Docker** and **Docker Compose** are installed:

```sh
docker --version && docker-compose --version
```

## 2️⃣ Project Structure

```
/project-root
│── api/          # Laravel Backend
│── spa/          # React Frontend (Vite)
│── docker-compose.yml
│── Dockerfile.dev
│── spa/Dockerfile.dev
```

## 3️⃣ Create Environment Files

Duplicate existing example files:

```sh
cp api/.env.example api/.env
cp spa/.env.example spa/.env
cp /.env.example /.env
```

## 4️⃣ Start Containers

### For development:

```sh
docker-compose up --build -d
```

### For production:

```sh
docker-compose -f docker-compose.prod.yml up --build -d
```

Check running containers:

```sh
docker ps
```

## 5️⃣ Backend & Database Setup

Access the backend container:

```sh
docker-compose exec backend sh
```

Run migrations & seed:

```sh
php artisan key:generate
php artisan migrate --seed
```

## 6️⃣ Debugging & Common Commands

### Restart containers:

```sh
docker-compose restart
```

### Stop & remove all containers:

```sh
docker-compose down -v
```

### Access backend container:

```sh
docker-compose exec backend sh
```

### Run Laravel commands:

```sh
php artisan cache:clear
php artisan route:list
```

Swagger API Docs: [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)

### Reinstall frontend dependencies:

```sh
docker-compose exec frontend sh -c "npm install && npm run dev -- --host"
```

Now your **Laravel + React (Vite)** project is running with **Docker** in development mode with fewer steps and better optimization. 🚀
