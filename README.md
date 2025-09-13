# Sister - Installation and Setup Guide

## 1) Clone and Install

```bash
composer install

npm install
```

## 2) Configure Environment

```bash
cp .env.example .env
```


```bash
php artisan key:generate
```

```bash
docker-compose up
```

## 3) Run Migrations (Per Module)
```bash
php artisan migrate:fresh
```

## 4) Start the Application

Start Laravel dev server:
```bash
composer run dev
```