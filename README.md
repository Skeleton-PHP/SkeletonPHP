# SkeletonPHP

A lightweight PHP framework skeleton designed to be easier to understand, safer to extend, and simpler to bootstrap for small web apps.

## Features

- Simple dependency container for lazy service registration
- Request and response helpers
- Error handler with debug-friendly output
- Basic MVC-style structure with sample controller, model, and view
- Router-based entry point for quick project start-up

## Getting started

1. Ensure PHP 8.1+ is installed.
2. Install Composer dependencies:
   ```bash
   composer install
   ```
3. Start the local PHP server:
   ```bash
   php -S localhost:8000
   ```
4. Open http://localhost:8000 in a browser.

## Project layout

```text
SkeletonPHP/
├── authentication/
├── config/
├── controller.php
├── controllers/
├── core/
├── database/
├── example.config.json
├── index.php
├── models/
├── views/
├── vendor/
├── composer.json
├── README.md
└── .htaccess
```

## Configuration

The app reads configuration from `config.json` if it exists. Otherwise it falls back to `example.config.json`, which is useful for local development without committing secrets.

Example settings:

```json
{
  "Database": {
    "host": "127.0.0.1",
    "username": "root",
    "password": "",
    "database_name": "skeletonphp",
    "table_name": "users"
  },
  "Settings": {
    "debug_mode": true
  }
}
```

## Notes

This repository is intentionally small and approachable. It is designed as a base to grow into a larger application while keeping the initial codebase easy to read and maintain.
