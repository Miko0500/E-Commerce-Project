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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Staff's name
            $table->integer('age'); // Staff's age
            $table->string('image')->nullable();
            $table->date('birthday'); // Staff's birthday
            $table->enum('sex', ['male', 'female', 'other']); // Staff's sex
            $table->string('contact'); // Staff's contact number
            $table->text('address'); // Staff's address
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
