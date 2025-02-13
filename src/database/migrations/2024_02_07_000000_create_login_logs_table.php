<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('login_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device_type')->nullable();
            $table->string('location')->nullable();
            $table->timestamp('login_time')->useCurrent()->nullable();
            $table->timestamp('logout_time')->nullable();
            $table->enum('status', ['success', 'failed'])->default('success');
            $table->string('error_message')->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('login_logs');
    }
};
