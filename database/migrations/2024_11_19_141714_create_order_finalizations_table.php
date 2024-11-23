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
            $table->decimal('total_price', 10, 2)->nullable(); // Total price as a decimal for proper calculation
            $table->string('vehicle')->nullable(); // Vehicle info
            $table->unsignedBigInteger('staff_id')->nullable(); // Reference to staff
            $table->string('size')->nullable(); // Size info
            $table->text('description')->nullable(); // Additional description
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('set null');
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
