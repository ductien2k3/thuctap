<?php

use App\Models\Shop_categori;
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
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_category_id')->constrained()->index()->name('shop_category_id'); // Sử dụng 'shop_category_id' thay vì ShopCategory::class
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('image')->nullable()->comment('image');
            $table->string('overview')->nullable()->comment('mô tả');
            $table->string('description');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_products');
    }
};
