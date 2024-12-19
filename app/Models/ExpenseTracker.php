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
            $table->id(); // Primary Key
            $table->string('category'); // Expense category
            $table->decimal('amount', 10, 2); // Expense amount
            $table->date('date'); // Expense date
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_trackers');
    }
}
