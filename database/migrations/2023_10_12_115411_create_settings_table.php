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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_en');
            $table->string('logo_bn');
            $table->string('title');
            $table->string('reminder_alert_day');
            $table->string('reminder_alert_time');
            $table->string('upload_files');
            $table->string('create_folder');
            $table->string('user_login');
            $table->string('remainder');
            $table->string('previous_version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
