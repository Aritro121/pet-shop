<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->decimal('price', 8, 2); // Or integer based on your requirements
            $table->boolean('feeding')->default(false);
            $table->boolean('boarding')->default(false);
            $table->boolean('spa')->default(false);
            $table->boolean('medicine')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
