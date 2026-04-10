# Laravel Task Project

This project implements various backend tasks using Laravel, including a REST API, external API consumption, web scraping, and custom HTTP requests.

## Task Overview

### Task 1: Simple REST API (Products)
- **Endpoints:**
  - `GET /api/products`: List all products (with pagination).
  - `POST /api/products`: Create a new product.
  - `DELETE /api/products/{id}`: Delete a product by ID.
- **Features:** 
  - Eloquent ORM with `Product` model.
  - Form request validation.
  - JSON responses.
  - SQLite database by default.

### Task 2: Consume External API
- **Endpoint:** `GET /api/external-posts`
- **Features:**
  - Fetches data from JSONPlaceholder.
  - Displays titles and bodies of the first 10 posts.
  - **Bonus:** Supports searching by title via `?query=text` parameter.

### Task 3: Basic Web Scraping
- **Endpoint:** `GET /api/scrape-quotes`
- **Features:**
  - Scrapes quotes and authors from `http://quotes.toscrape.com/`.
  - Uses Laravel HTTP Client and `DOMDocument`/`XPath`.
  - Returns results in JSON format.

### Task 4: HTTP Request with Custom Headers
- **Endpoint:** `GET /api/custom-request`
- **Features:**
  - Sends a request to `https://httpbin.org/get`.
  - Sets custom `User-Agent` and `Accept` headers.
  - **Bonus:** Implements retry logic (3 attempts).
  - Returns API response and HTTP status code.

### Task 5: Documentation
- This `README.md` file defines the project setup and features.

---

## Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd laravl-task
   ```

2. **Install Dependencies:**
   ```bash
   composer install
   ```

3. **Environment Setup:**
   The project is pre-configured to use SQLite. Ensure the database file exists:
   ```bash
   touch database/database.sqlite
   ```
   (Actually, Laravel 11/12 usually handles this, but good to check).

4. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

5. **Start the Development Server:**
   ```bash
   php artisan serve
   ```

6. **Test Endpoints:**
   You can use tools like Postman or `curl` to test the API at `http://localhost:8000/api/...`.

---

## Technical Details

- **Laravel Version:** 11.x / 12.x
- **PHP Version:** 8.2+
- **Architecture:** Controller-based API structure (`ProductController`, `TaskController`).
