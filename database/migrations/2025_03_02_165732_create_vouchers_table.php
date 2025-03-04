<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id('id_voucher');
            $table->string('code')->unique();
            $table->decimal('discount', 5, 2);
            $table->decimal('min_transaction', 10, 2);
            $table->decimal('max_discount', 10, 2);
            $table->integer('limit')->default(1);
            $table->string('game')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
};
