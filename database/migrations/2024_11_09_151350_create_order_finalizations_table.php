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
        Schema::create('order_finalizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Reference to the order
            $table->string('total_price')->nullable(); // Total price as a flexible string
            $table->text('description')->nullable(); // Additional description
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_finalizations');
    }
};
