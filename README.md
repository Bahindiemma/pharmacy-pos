# Pharmacy Point of Sale System

This is a Pharmacy Point of Sale (POS) system developed using Laravel. It is designed to help pharmacies manage their sales, inventory, and customer records efficiently. This README provides instructions on how to set up and run the Laravel project locally.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- [PHP](https://www.php.net/) (>= 7.4) installed on your machine
- [Composer](https://getcomposer.org/) installed
- [MySQL](https://www.mysql.com/) database server installed
- [Node.js](https://nodejs.org/) installed
- [Git](https://git-scm.com/) installed
- A code editor of your choice (e.g., [Visual Studio Code](https://code.visualstudio.com/))

## Installation

1. Clone the repository to your local machine using Git:

    ```bash
    git clone https://github.com/yourusername/pharmacy-pos.git
    ```

2. Navigate to the project directory:

    ```bash
    cd pharmacy-pos
    ```

3. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Open the `.env` file and configure your database connection settings:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

7. Run database migrations to create the necessary tables:

    ```bash
    php artisan migrate
    ```

8. Install JavaScript dependencies using npm:

    ```bash
    npm install
    ```

9. Compile frontend assets:

    ```bash
    npm run dev
    ```

## Running the Application

To start the Laravel development server, run the following command:

```bash
php artisan serve
```

The application will be accessible at `http://localhost:8000` by default.

## Additional Configuration

### Mail Configuration

To configure email settings, open the `.env` file and set the following variables with your email provider credentials:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_email@example.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
```

## Usage

You can now start using the Pharmacy Point of Sale system by accessing it through your web browser. Feel free to explore the features and functionalities provided by the application.

## Contributing

If you would like to contribute to this project, please follow our [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [MIT License](LICENSE).

---

**Note:** Make sure to keep your `.env` file secure and never share sensitive information such as your database credentials or API keys publicly.

For any issues or inquiries, please contact EMMANUEL BAHINDI (mailto:ebahindi@gmail.com).
