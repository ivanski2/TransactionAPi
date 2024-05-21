# Transaction Service API

**API Endpoints**:
    - **Transaction Endpoints**:
        - `POST /api/transactions`: Create a new transaction
        - `GET /api/transactions`: List all transactions
        - `GET /api/transactions/{id}`: Get details of a specific transaction
        - `PUT /api/transactions/{id}`: Update a specific transaction
        - `DELETE /api/transactions/{id}`: Delete a specific transaction



## Setup Instructions

### Prerequisites

- PHP >= 7.3
- Composer
- MySQL or any other supported database
- Node.js and NPM (optional, for frontend scaffolding)

### Installation

1. **Clone the repository**

    ```bash
    git clone " your project git repository"
    cd transaction-service-api
    ```

2. **Install dependencies**

    ```bash
    composer install
    ```

3. **Set up environment variables**

   Copy `.env.example` to `.env` and update the environment variables accordingly.

    ```bash
    cp .env.example .env
    ```

   Update your database configuration in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. **Generate application key**

    ```bash
    php artisan key:generate
    ```

5. **Run migrations**

    ```bash
    php artisan migrate
    ```

6. **Seed the database (optional)**

    ```bash
    php artisan db:seed
    ```

7. **Install Laravel Sanctum**

    ```bash
    composer require laravel/sanctum
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    php artisan migrate
    ```

8. **Serve the application**

    ```bash
    php artisan serve
    ```

   The application will be available at `http://127.0.0.1:8000`.

### API Endpoints

- **Register**

    ```http
    POST /api/register
    ```

  Request body:

    ```json
    {
        "name": "Ivan Ivanov",
        "email": "ivanski34@gmail.com",
        "password": "password",
        "password_confirmation": "password"
    }
    ```

- **Login**

    ```http
    POST /api/login
    ```

  Request body:

    ```json
    {
        "email": "ivanski34@gmail.com",
        "password": "password"
    }
    ```

  Response:

    ```json
    {
        "access_token": "token",
        "token_type": "Bearer"
    }
    ```

- **Logout**

    ```http
    POST /api/logout
    ```

- **Get User**

    ```http
    GET /api/user
    ```

- **Create Transaction**

    ```http
    POST /api/transactions
    ```

  Request body:

    ```json
    {
        "amount": 100,
        "type": "deposit",
        "description": "Initial deposit"
    }
    ```

- **List Transactions**

    ```http
    GET /api/transactions
    ```

- **Get Transaction Details**

    ```http
    GET /api/transactions/{id}
    ```

- **Update Transaction**

    ```http
    PUT /api/transactions/{id}
    ```

  Request body:

    ```json
    {
        "amount": 150,
        "type": "deposit",
        "description": "Updated deposit"
    }
    ```

- **Delete Transaction**

    ```http
    DELETE /api/transactions/{id}
    ```


### Troubleshooting

- Ensure all environment variables are correctly set.
- Run `php artisan config:clear` and `php artisan cache:clear` to clear any configuration cache.



