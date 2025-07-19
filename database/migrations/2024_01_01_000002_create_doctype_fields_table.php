<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctype_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctype_id')->constrained('doctypes')->cascadeOnDelete();
            $table->string('fieldname', 100);
            $table->string('label', 150);
            $table->string('fieldtype', 50); // text, select, number, date, etc.
            $table->json('options')->nullable(); // For select fields, validation rules, etc.
            $table->boolean('required')->default(false);
            $table->boolean('unique')->default(false);
            $table->boolean('in_list_view')->default(false);
            $table->boolean('in_standard_filter')->default(false);
            $table->boolean('hidden')->default(false);
            $table->boolean('read_only')->default(false);
            $table->text('description')->nullable();
            $table->text('default_value')->nullable();
            $table->string('placeholder', 255)->nullable();
            $table->string('help_text', 500)->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('depends_on', 100)->nullable(); // Conditional field dependency
            $table->json('validation_rules')->nullable(); // Custom validation rules
            $table->timestamps();

            // Constraints and indexes
            $table->unique(['doctype_id', 'fieldname']);
            $table->index(['doctype_id', 'sort_order']);
            $table->index(['doctype_id', 'in_list_view']);
            $table->index(['doctype_id', 'required']);
            $table->index('fieldtype');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctype_fields');
    }
};
