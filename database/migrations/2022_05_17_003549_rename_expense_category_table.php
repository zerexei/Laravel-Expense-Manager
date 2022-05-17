<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Schema::table('old_table', function (Blueprint $table) {
        //     $table->dropForeign(['transaction_id']);
        // });

        Schema::rename('expense_category', 'expense_categories');

        // Schema::table('new_table', function (Blueprint $table) {
        //     $table->foreign('transaction_id')->references('id')->on('transactions');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::rename('expense_categories', 'expense_category');
    }
};
