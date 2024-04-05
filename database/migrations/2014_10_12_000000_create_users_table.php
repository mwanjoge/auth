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
        $this->down();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('full_name',100);
            $table->string('username',100);
            $table->string('user_type',100)->nullable();
            $table->morphs('userable');
            $table->boolean('is_app_user')->default(true);
            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('is_active', ['ACTIVE', 'INACTIVE'])->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('change_password')->default(false);
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
