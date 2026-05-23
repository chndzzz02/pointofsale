# 🛒 UMKM E-Commerce & Point of Sale System

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="280" alt="Laravel Logo">
</p>

<p align="center">
  A modern Laravel-based E-Commerce & POS system for UMKM businesses with multi-role access, cart system, checkout, and dashboard management.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10+-red?style=for-the-badge">
  <img src="https://img.shields.io/badge/Status-Active-success?style=for-the-badge">
  <img src="https://img.shields.io/badge/License-MIT-blue?style=for-the-badge">
</p>

---

## ✨ Features

### 👤 Authentication & Roles
- Multi-role system (Admin, Seller, Customer)
- Secure login & registration
- Profile management

### 🛍️ Customer Features
- Browse products
- Add to cart
- Checkout system
- Order history

### 🧑‍💼 Seller Dashboard
- Product CRUD
- Manage orders
- Sales statistics dashboard

### 🛠️ Admin Panel
- User management
- Product management
- Transaction monitoring

---

## ⚙️ Tech Stack

- Laravel 10+
- PHP 8+
- MySQL / MariaDB
- Bootstrap UI
- Vite
- Midtrans Payment Integration

---

## 📸 Demo Account

- Admin   : admin@example.com / password
- Seller  : seller@example.com / password
- Customer: user@example.com / password

---

## 🚀 Installation

```bash
git clone https://github.com/username/repo.git
cd repo
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve