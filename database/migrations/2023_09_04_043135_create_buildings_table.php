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
            $table->bigInteger();
            $table->string('name');
            $table->bigInteger('price');
            $table->text('description')->nullable();
            $table->text('id_facility');
            $table->text('picture_1');
            $table->text('picture_2');
            $table->text('picture_3');
            $table->text('picture_4');
            $table->text('picture_5');
            $table->text('picture_6');
            $table->text('picture_7');
            $table->text('picture_8');
            $table->text('picture_9');
            $table->text('picture_10');
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
