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
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('price');
            $table->text('address');
            $table->text('description')->nullable();
            $table->text('facilities');
            $table->text('picture_1')->nullable();
            $table->text('picture_2')->nullable();
            $table->text('picture_3')->nullable();
            $table->text('picture_4')->nullable();
            $table->text('picture_5')->nullable();
            $table->text('picture_6')->nullable();
            $table->text('picture_7')->nullable();
            $table->text('picture_8')->nullable();
            $table->text('picture_9')->nullable();
            $table->text('picture_10')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('buildings');
    }
};
