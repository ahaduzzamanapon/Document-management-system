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
        Schema::create('share_models', function (Blueprint $table) {
            $table->id();
            $table->string('document_id');
            $table->string('document_type');
            $table->string('shared_id');
            $table->string('permission');
            $table->string('shared_by');
            $table->string('shared_to');
            $table->date('date');
            $table->string('time');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_models');
    }
};
