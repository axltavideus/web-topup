<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->timestamp('tanggal_transaksi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('jumlah_transaksi', 10, 2);
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id')->nullable();
            $table->string('no_whatsapp');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('id_method');
            $table->timestamps();
            $table->string('payment_url')->nullable();
            $table->string('no_va')->nullable();
            $table->unsignedBigInteger('id_voucher')->nullable();
            $table->text('message')->nullable();

            // Foreign Key Constraints
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_method')->references('id_method')->on('payment_methods')->onDelete('cascade');
            $table->foreign('id_voucher')->references('id_voucher')->on('vouchers')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
