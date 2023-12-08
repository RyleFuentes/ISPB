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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('product_id')->on('products')->onDelete('cascade');
            $table->integer('order_quantity')->nullable(true);
            $table->decimal('order_kilo')->nullable(true);
            $table->tinyInteger('order_type'); //? 1 == retail orders ; 2 == wholesale orders
            $table->decimal('total_price', 10, 3);
            $table->date('due_date');
            $table->tinyInteger('status')->default(0); //? 0 == pending ; 1 == completed; 2 == cancelled
            $table->string('recipient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
