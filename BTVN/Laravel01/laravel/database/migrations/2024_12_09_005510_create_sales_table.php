<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
       Schema::create('sales', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('medicine_id'); // Khóa ngoại tham chiếu 'id' trong bảng 'medicines'
    $table->integer('quantity');
    $table->dateTime('sale_date');
    $table->string('customer_phone', 20)->nullable();
    $table->timestamps();

    $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
});
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
