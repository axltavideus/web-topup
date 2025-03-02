<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->dateTime('tanggal_transaksi');
            $table->decimal('jumlah_transaksi', 10, 2);
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('no_whatsapp')->nullable();
            $table->string('status');
            $table->string('payment_url')->nullable();
            $table->string('no_va')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
