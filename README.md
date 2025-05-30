<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

# 🍽️ Meal Subscription Delivery System (Laravel + Breeze)

A full-stack Laravel web application for managing meal subscription plans, built with Laravel Breeze for authentication and TailwindCSS for UI.

---

## 🚀 Features

- ✔️ Laravel 10+
- ✔️ Laravel Breeze starter auth (Blade + Tailwind)
- ✔️ User registration, login, logout
- ✔️ Meal plan listing and selection
- ✔️ Order tracking (if implemented)
- ✔️ Responsive design

---

## 📦 Technologies Used

- Laravel Framework
- Laravel Breeze (Blade-based scaffolding)
- Tailwind CSS
- Composer & npm
- PostgreSQL / MySQL (configurable)

---

## 🔧 Installation Guide

### 🛑 Prerequisites

Ensure the following are installed:

- PHP 8.1+
- Composer
- Node.js and npm
- Git
- Database (MySQL/PostgreSQL)

---

### ⚙️ Setup Steps

Clone the repository:

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo

composer install

composer require laravel/breeze --dev
php artisan breeze:install

npm install
php artisan key:generate
php artisan migrate
php artisan serve

