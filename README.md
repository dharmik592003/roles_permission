# 🛡️ Laravel Blog Roles & Permissions (Spatie-based)

This is a simple Laravel project that demonstrates **role-based access control (RBAC)** for a **blogging site**, built using the powerful [Spatie Laravel-Permission](https://spatie.be/docs/laravel-permission) package.

It allows you to define multiple user roles such as Admin, Editor, Author, and Reader, each with custom access levels and permissions.

---

## 🚀 Features

- ✅ Role-based access control using Spatie
- 👥 Predefined roles:
  - **Admin** – Full access to manage users, posts, and settings
  - **Editor** – Can edit and publish all posts
  - **Author** – Can create and manage own posts
  - **Reader** – Can read only published posts
- 🔐 Middleware route protection (`role`, `permission`)
- 🎯 Assign permissions dynamically to users or roles
- 🧱 Clean architecture and modular setup
- 📝 Ready to plug into any Laravel-based blog or CMS

---

## 🧰 Tech Stack

- **Laravel 10+**
- **Spatie Laravel-Permission**
- **Laravel Breeze / Jetstream** (for auth scaffolding)
- **Blade / Vue / Livewire** (optional frontend)
- **MySQL / SQLite**

---

## 📦 Installation

Follow the steps below to set up the project locally:

```bash
# 1. Clone the repository
git clone https://github.com/your-username/laravel-blog-roles-permissions.git
cd laravel-blog-roles-permissions

# 2. Install PHP dependencies
composer install

# 3. Install JavaScript dependencies
npm install && npm run dev

# 4. Create a copy of .env and generate app key
cp .env.example .env
php artisan key:generate

# 5. Configure your database in .env

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Start the server
php artisan serve
