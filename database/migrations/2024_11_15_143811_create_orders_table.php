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
            $table->id();
            $table->string('name')->nullable();
            $table->string('rec_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->default('In Queue');
            $table->unsignedBigInteger('user_id');
            $table->json('product_id')->default(json_encode([])); // Store empty array by default
            $table->json('staff_id')->default(json_encode([]));   // Store empty array by default
            $table->unsignedBigInteger('vehicle_id')->nullable(); // Reference to vehicle
            $table->string('size')->nullable();
            $table->dateTime('service_datetime')->nullable(); // Date and time for availing the service
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onUpdate('cascade')->onDelete('set null');
            
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
