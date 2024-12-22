# Laravel 8 - Expense application

## Screenshots


![preview img](/Expensecategory.png)
![preview img](/Expenses-List.png)
![preview img](/Financial-summary.png)
![preview img](/Income-category.png)
![preview img](/Income-List.png)
![preview img](/Monthly-report.png)
![preview img](/dashboard.png)

## Run Locally

Clone the project

```bash
  git clone https://github.com/abdulaziz-m5u/laravel-expense-app.git project-name
```

Go to the project directory

 - Copy .env.example file and paste it. Rename it to .env
 - Run the xampp and Open your browser and navigate to `http://localhost:8000`  and create a Database example: expense_app and copyt it paste it to DB_DATABASE=expense_app
 ![preview img](/Database.png)

 - Go back to comandprompt
 - Run the following command to generate a key for the application

```bash
    composer install
```

```bash
    composer update
```

```bash
    php artisan key:generate
```

```bash
    php artisan migrate:fresh --seed
```

```bash
    php artisan serve
```

#### For admin Login
here's the default admin account.

-   email = admin@example.com
-   password = 123
