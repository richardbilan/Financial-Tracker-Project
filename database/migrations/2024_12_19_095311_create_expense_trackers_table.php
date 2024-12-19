<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_trackers', function (Blueprint $table) {
            $table->id(); // Primary key: auto-incrementing ID
            $table->string('Budget', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->string('Rent', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->string('Transportation', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->string('Water Bill', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->string('Electric Bill', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->string('Miscellaneous', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->string('Savings', 10, 2); // Column for the category of the expense (e.g., Grocery, Rent, etc.)
            $table->decimal('amount', 10, 2); // Column for the amount, ensuring two decimal places
            $table->date('Month'); // Column for the date of the expense
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_trackers'); // Drop the table if migration is rolled back
    }
}
