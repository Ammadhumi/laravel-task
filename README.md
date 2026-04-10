# Laravel Task Project


### Task 1: Simple REST API (Products)
- **Endpoints:**
  - `GET /api/products`: List all products (with pagination)
  - `POST /api/products`: Create a new product
  - `DELETE /api/products/{id}`: Delete a product 
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



 **Test Endpoints:**
   You can use tools like Postman or `curl` to test the API at `http://localhost:8000/api/...`.
