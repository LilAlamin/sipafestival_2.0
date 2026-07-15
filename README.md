
# 🎭 SIPA Festival 2.0 (Solo International Performing Arts)

Welcome to **SIPA Festival 2.0**, the official CMS and web portal for managing the **Solo International Performing Arts (SIPA)** festival. This system is designed to handle public complaints, news publishing, and gallery management.

Built with **Laravel 12**, **Vite**, and **Tailwind CSS v4**.

---

## ✨ Features

- **🎭 Public Portal**: View performing arts news and information.
- **📰 News Management**: Publish news with support for Draft & Published statuses, custom slugs, and images.
- **💬 Complaint Center**: Direct citizen feedback system (Unreplied vs. Replied categories) with direct email replying interface.
- **🖼️ Gallery Management**: Admin interface for viewing and managing performance art galleries.
- **🌐 Multilingual Support**: Seamlessly switch between Indonesian (`id`) and English (`en`).

---

## 🛠️ Tech Stack

- **Framework**: Laravel 12
- **Frontend Tools**: Vite + Tailwind CSS v4
- **Database**: MySQL

---

## 📥 Installation & Setup

Follow these steps to set up and run the project locally using XAMPP:

### 1. Clone the Repository
```bash
git clone https://github.com/LilAlamin/sipafestival_2.0.git
cd sipafestival
```

### 2. Install PHP Dependencies
Make sure you have [Composer](https://getcomposer.org/) installed:
```bash
composer install
```

### 3. Install Frontend Dependencies
```bash
npm install
```

### 4. Environment Configuration
Copy the environment template file:
> [!NOTE]
> The template file in this repository is named `.env example` (with a space).
```bash
cp ".env example" .env
```

Generate the application key:
```bash
php artisan key:generate
```

### 5. Database Configuration
1. Open **XAMPP** and start **Apache** and **MySQL**.
2. Open **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Create a new database named `sipafestival`.
4. Update your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sipafestival
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 6. Migrations & Seeders
Run the migrations and seed dummy data (News, Complaints, etc.):
```bash
php artisan migrate --seed
```

---

## 🚀 Running the Application

### Local Development Server (Concurrently)
To run the Laravel server, Vite compiler, queue listener, and log output concurrently in a single command:
```bash
composer dev
```
The application will be available at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Manual Run
If you prefer running them in separate terminal windows:
```bash
# Terminal 1: Laravel Web Server
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev
```

---

## 🧹 Code Quality & Formatting
We use Laravel Pint to enforce standard PHP style guidelines. Run this before staging and committing code:
```bash
./vendor/bin/pint
```

