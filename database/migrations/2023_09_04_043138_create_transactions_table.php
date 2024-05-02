<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_admin')->nullable();
            $table->bigInteger('id_customer');
            $table->bigInteger('id_building');
            $table->integer('total_day')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->text('transfer_image')->nullable();
            $table->integer('total_pay')->nullable();
            $table->integer('status_order');
            $table->integer('status_transaction');
            $table->string('code')->unique();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
