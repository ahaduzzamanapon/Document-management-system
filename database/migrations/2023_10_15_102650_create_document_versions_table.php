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
        Schema::create('document_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->string('title');
            $table->string('filetype');
            $table->unsignedBigInteger('file_size')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('file_path', 255);
            $table->timestamps(0);
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('document_versions');
    }
};
