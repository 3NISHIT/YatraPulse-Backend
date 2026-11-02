<div align="center">

# YatraPulse — Backend

### Laravel REST API

Backend services powering the YatraPulse travel platform.

[![Laravel](https://img.shields.io/badge/Laravel-Backend-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Live Application](https://img.shields.io/badge/Live%20Application-YatraPulse-0A7B83?style=for-the-badge&logo=googlechrome&logoColor=white)](https://yatrapulse.nivsee.com/)

**Public Website:** [https://yatrapulse.nivsee.com/](https://yatrapulse.nivsee.com/)

</div>

---

## Overview

This repository contains the Laravel backend for **YatraPulse**. It provides API services used by the YatraPulse frontend for application functionality and data management.

## Technology

- **Backend Framework:** Laravel
- **Language:** PHP
- **Database:** MySQL
- **API:** RESTful API
- **Dependency Management:** Composer

## Main API Areas

Based on the current backend source structure:

- Admin authentication
- Destinations
- Tours
- Itineraries
- Bookings

## Repository Structure

```text
backend/
├── app/
│   ├── Http/Controllers/Api/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
├── routes/
│   └── api.php
├── tests/
├── artisan
├── composer.json
└── .env.example
```

## Local Setup

### 1. Clone the repository

```bash
git clone https://github.com/YOUR_GITHUB_USERNAME/YatraPulse-Backend.git
cd YatraPulse-Backend
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure environment

```bash
cp .env.example .env
```

On Windows Command Prompt, use:

```cmd
copy .env.example .env
```

Update the database and application settings in `.env`.

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Run database migrations

```bash
php artisan migrate
```

Run seeders only if required for your local environment:

```bash
php artisan db:seed
```

### 6. Start the development server

```bash
php artisan serve
```

The local Laravel application will be available at:

```text
http://127.0.0.1:8000
```

## Environment & Security

- Create your own `.env` file from `.env.example`.
- Never commit `.env`, passwords, API tokens, private keys, or production credentials.
- Keep production secrets in the hosting environment, not in source control.
- Review Postman environment/global files before publishing them.

## Live Application

Visit the public YatraPulse application:

**[https://yatrapulse.nivsee.com/](https://yatrapulse.nivsee.com/)**

> The public URL points to the deployed application. API endpoint availability and documentation should be confirmed against the deployed backend configuration.

---

<div align="center">

**YatraPulse — Explore. Plan. Experience.**

</div>
