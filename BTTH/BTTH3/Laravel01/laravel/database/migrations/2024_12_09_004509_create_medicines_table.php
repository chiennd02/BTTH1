<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' với kiểu 'bigIncrements'
            $table->string('name', 255);
            $table->string('brand', 100)->nullable();
            $table->string('dosage', 50);
            $table->string('form', 50);
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
};
