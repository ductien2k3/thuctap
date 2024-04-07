<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
 
    class CreateCartItemsTable extends Migration
    {
        public function up()
        {
            Schema::create('cart_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->string('product_name');
                $table->integer('quantity');
                $table->decimal('price', 8, 2);
                $table->timestamps();
            });
        }
 
        public function down()
        {
            Schema::dropIfExists('cart_items');
        }
    }