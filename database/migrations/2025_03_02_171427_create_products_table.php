<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('buyer_sku_code')->nullable();
            $table->string('product_name');
            $table->string('category');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->string('brand')->nullable();
            $table->string('seller_name')->nullable();
            $table->boolean('buyer_product_status')->default(true);
            $table->boolean('seller_product_status')->default(true);
            $table->boolean('unlimited_stock')->default(false);
            $table->integer('stock')->nullable();
            $table->boolean('multi')->default(false);
            $table->timestamp('start_cut_off')->nullable();
            $table->timestamp('end_cut_off')->nullable();
            $table->timestamps(); // Adds created_at and updated_at
            $table->boolean('status')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
