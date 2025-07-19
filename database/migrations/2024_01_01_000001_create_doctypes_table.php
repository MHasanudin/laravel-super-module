<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctypes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('label', 150);
            $table->text('description')->nullable();
            $table->json('fields')->nullable(); // Store field definitions as JSON
            $table->json('settings')->nullable(); // Store additional settings
            $table->boolean('is_active')->default(true);
            $table->boolean('is_system')->default(false);
            $table->string('icon', 50)->nullable();
            $table->string('color', 7)->nullable(); // For hex colors
            $table->string('module', 50)->nullable(); // Module namespace
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['is_active', 'is_system']);
            $table->index('label');
            $table->index('module');
            $table->index('sort_order');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctypes');
    }
};
