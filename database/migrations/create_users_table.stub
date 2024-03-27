<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name',100);
            $table->string('username',100);
            $table->string('user_type',100)->nullable();
            $table->morphs('userable');
            $table->tinyInteger('is_app_user');
            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('is_active', ['ACTIVE', 'INACTIVE'])->nullable();
            $table->string('image_url')->nullable();
            $table->tinyInteger('change_password');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
