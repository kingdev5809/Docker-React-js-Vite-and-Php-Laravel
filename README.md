# Laravel + React (Vite) Docker Setup - Development Mode

This guide provides step-by-step instructions to run the Laravel (PHP) backend and React (Vite) frontend in **development mode** using Docker.

## 🚀 Prerequisites

Make sure you have the following installed on your system:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [HeidiSQL](https://www.heidisql.com/) (optional, for database management)

## 📂 Project Structure

```
/project-root
│── api/          # Laravel Backend
│── spa/          # React Frontend (Vite)
│── docker-compose.dev.yml  # Development Docker Compose File
│── Dockerfile.dev  # Backend (PHP) Dockerfile for Dev Mode
│── spa/Dockerfile.dev  # Frontend (React Vite) Dockerfile for Dev Mode
│── entrypoint.sh  # Laravel Entrypoint Script
```

## 🔧 Setup & Run Development Mode

### 1️⃣ Clone the Repository

```sh
git clone https://github.com/your-repo/project.git
cd project
```

### 2️⃣ Set Up Environment Variables

#### Backend (`api/.env`):

```ini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=e_navbatchi
DB_USERNAME=root
DB_PASSWORD=1111
APP_ENV=local
APP_DEBUG=true
```

#### Frontend (`spa/.env`):

```ini
VITE_API_BASE_URL=http://localhost:8000/api
```

### 3️⃣ Start the Docker Containers

Run the following command to start everything in **development mode**:

```sh
docker-compose -f docker-compose.dev.yml up --build
```

### 4️⃣ Open the Project

- **Backend (Laravel API)**: `http://localhost:8000`
- **Frontend (React Vite)**: `http://localhost:3030`
- **Database (MySQL - HeidiSQL or any client)**: `localhost:3317`

### 5️⃣ Verify MySQL Connection

Run the following inside the **backend container**:

```sh
docker-compose exec backend php artisan migrate
```

If you get a **database connection error**, ensure MySQL is running properly:

```sh
docker-compose logs mysql
```

## 🔄 Useful Commands

### Stop & Remove Containers

```sh
docker-compose -f docker-compose.dev.yml down
```

### Rebuild Everything (including volumes)

```sh
docker-compose -f docker-compose.dev.yml down -v
```

### Access the Backend Container

```sh
docker-compose exec backend sh
```

### Access MySQL Inside Container

```sh
docker-compose exec mysql mysql -u root -p
# Enter password: 1111
```

## 🛠 Troubleshooting

### **1️⃣ MySQL Connection Refused?**

- Ensure **DB_HOST=mysql** in `api/.env`
- Restart containers: `docker-compose -f docker-compose.dev.yml restart`
- Check logs: `docker-compose logs mysql`

### **2️⃣ Node Modules Not Installing?**

Run inside the frontend container:

```sh
docker-compose exec frontend sh
npm install
```

### **3️⃣ Artisan Commands Not Working?**

```sh
docker-compose exec backend php artisan cache:clear
```

---

Now your Laravel + React (Vite) app should be up and running in **development mode!** 🚀
