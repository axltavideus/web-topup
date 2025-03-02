<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Auto-incrementing primary key
            $table->string('username');
            $table->string('email')->unique();
            $table->string('no_telp'); // Phone number
            $table->string('password');
            $table->unsignedBigInteger('id_transaksi')->nullable(); // Foreign key to transaksi table
            $table->timestamp('date_created')->useCurrent(); // Default to current timestamp

            // Foreign key constraint (assuming there's a transactions table)
            $table->foreign('id_transaksi')->references('id')->on('transactions')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

