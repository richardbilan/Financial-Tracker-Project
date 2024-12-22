# Laravel 8 - Expense application

## Screenshots

Register
![preview img](/preview.png)
Enter your expenses
![preview img](/preview6.png)
Enter what kind of Income you have
![preview img](/preview3.png)
Enter the amount and the date you spend
![preview img](/preview7.png)
Enter the amount of your incomes
![preview img](/preview4.png)
You can track the expenses here
![preview img](/preview2.png)
For Overviewing the expenses and total amount 
![preview img](/preview9.png)
Print the expenses
![preview img](/preview5.png)





## Run Locally

Clone the project

```bash
  git clone https://github.com/abdulaziz-m5u/laravel-expense-app.git project-name
```

Go to the project directory

 - Copy .env.example file and paste it. Rename it to .env
 - Run the xampp and Open your browser and navigate to `http://localhost:8000`  and create a Database example: expense_app and copyt it paste it to DB_DATABASE=expense_app
![preview img](/preview8.png)
![preview img](/preview10.png)
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
