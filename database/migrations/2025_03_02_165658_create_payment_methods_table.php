<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id('id_method');
            $table->string('code');
            $table->string('type');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('fee', 10, 2)->default(0);
            $table->string('fee_type')->default('fixed');
            $table->decimal('min_amount', 10, 2)->default(0);
            $table->integer('expiry_period')->nullable();
            $table->string('status')->default('active');
            $table->text('instruksi')->nullable();
            $table->string('provider')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
};
