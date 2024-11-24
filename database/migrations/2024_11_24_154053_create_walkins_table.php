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
        Schema::create('walkins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->default('In Queue');
            $table->unsignedBigInteger('staff_id')->nullable(); // Reference to staff
            $table->unsignedBigInteger('vehicle_id')->nullable(); // Reference to vehicle
            $table->string('size')->nullable();
            $table->dateTime('service_datetime')->nullable(); // Date and time for availing the service
            $table->boolean('isPriority')->default(false); // Field for priority walk-in status

            // Foreign keys
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onUpdate('cascade')->onDelete('set null'); // Vehicle foreign key

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walkins');
    }
};
