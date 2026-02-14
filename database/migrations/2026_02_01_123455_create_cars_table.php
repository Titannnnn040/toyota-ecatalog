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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Toyota Fortuner"
            $table->string('slug')->unique(); // for URLs like /cars/toyota-fortuner
            $table->string('category'); // e.g., "SUV", "MPV"
            $table->decimal('price', 15, 2); // e.g., 500000000
            $table->string('thumbnail'); // Main image
            $table->text('features')->nullable(); // JSON or text list of features
            $table->boolean('is_featured')->default(false); // For the Hero slider
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
