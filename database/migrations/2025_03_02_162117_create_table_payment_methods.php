<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('type');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('fee', 8, 2)->nullable();
            $table->string('fee_type')->nullable();
            $table->decimal('min_amount', 10, 2)->nullable();
            $table->integer('expiry_period')->nullable();
            $table->string('status')->default('active');
            $table->text('instruksi')->nullable();
            $table->string('provider')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
};

