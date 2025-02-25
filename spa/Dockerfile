# Используем Node.js для сборки
FROM node:18-alpine AS build-stage

# Устанавливаем рабочую директорию
WORKDIR /app

# Копируем package.json и package-lock.json и устанавливаем зависимости
COPY package.json package-lock.json ./
RUN npm ci

# Копируем исходный код и выполняем сборку
COPY . .
RUN npm run build

# Запускаем Nginx для раздачи статических файлов
FROM nginx:alpine AS production-stage

# Копируем билд React (Vite) в Nginx
COPY --from=build-stage /app/dist /usr/share/nginx/html

# Копируем конфигурацию Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Открываем порт 80
EXPOSE 80

# Запускаем Nginx
CMD ["nginx", "-g", "daemon off;"]
