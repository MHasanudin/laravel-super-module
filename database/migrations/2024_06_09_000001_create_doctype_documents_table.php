<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctype_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctype_id')->constrained('doctypes')->onDelete('cascade');
            $table->string('document_name', 200)->nullable(); // Human-readable document identifier
            $table->string('status', 50)->default('Draft'); // Draft, Published, Archived, etc.
            $table->json('data'); // Actual document data
            $table->json('meta')->nullable(); // Additional metadata
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes(); // Soft deletes for data recovery
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['doctype_id', 'status']);
            $table->index(['doctype_id', 'created_at']);
            $table->index(['doctype_id', 'document_name']);
            $table->index('created_by');
            $table->index('published_at');
            $table->index('deleted_at');
            
            // Full-text search index on document_name if using MySQL
            if (DB::getDriverName() === 'mysql') {
                $table->fullText(['document_name']);
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctype_documents');
    }
};