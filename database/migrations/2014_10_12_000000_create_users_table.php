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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('role'); // Có thể cần điều chỉnh kiểu dữ liệu hoặc quan hệ tới một bảng riêng chứa các vai trò.
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_name'); 
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone_code');
            $table->string('area'); // Có thể không duy nhất nếu không định rõ.
            $table->string('phone_number')->unique(); // Kiểu số điện thoại có thể cần thay đổi.
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
