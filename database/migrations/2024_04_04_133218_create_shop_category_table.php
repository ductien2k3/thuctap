<?php

use App\Models\Shop;
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
        Schema::create('shop_category', function (Blueprint $table) {
            $table->id();
    $table->foreignId('shop_id')->constrained()->index()->name('shop_id'); // Sử dụng 'shop_id' thay vì Shop::class
    $table->string('name');
    $table->string('image');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_category');
    }
};
