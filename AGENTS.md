# OpenCode Agent Instructions: Sipafestival

This repository is a **Laravel 12** web application using **Vite** and **Tailwind CSS v4**. It serves as a CMS/portal with features for managing News and Complaints.

## Architecture & Entrypoints
- **Routes:** HTTP routes are defined in `routes/web.php`.
- **Controllers:** Business logic lives in `app/Http/Controllers/`. Key domains include `NewsController` and `ComplaintController`.
- **Views:** Frontend uses standard Laravel Blade templates in `resources/views/`. No heavy JS frameworks (React/Vue) are configured.

## Developer Workflow & Commands
- **Local Dev Server:** Run `composer dev` to start everything concurrently (Laravel HTTP server, queue listener, log stream, and Vite dev server). This is the preferred command.
- **Manual Servers:** Alternatively, run `php artisan serve` and `npm run dev` in separate terminals.
- **Formatting:** Code style is enforced via Laravel Pint. Run `./vendor/bin/pint` to automatically format PHP files before committing.

## Database & Environment Quirks
- The example env file is unconventionally named `.env example` (with a space), not `.env.example`.
- The application expects a **MySQL** database named `sipafestival` running on `127.0.0.1:3306` (default XAMPP credentials: user `root` with no password).
- **Migrations:** Run `php artisan migrate` to create/update tables.

## Testing Quirks
- Run tests via `php artisan test` or `./vendor/bin/phpunit`.
- **Warning:** In `phpunit.xml`, the in-memory SQLite configuration is commented out. Tests will currently run against the main MySQL database defined in `.env`. Be cautious when writing tests that use database transactions or migrations (`RefreshDatabase`), as they may affect the primary local database unless configured otherwise.
