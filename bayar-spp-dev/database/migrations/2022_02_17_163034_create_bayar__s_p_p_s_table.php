<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarSPPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar__s_p_p_s', function (Blueprint $table) {
            $table->id();
            $table->year('Tahun Ajaran');
            $table->string('Bulan');
            $table->double('Total Tagihan');
            $table->enum('Status', ['Lunas', 'Belum Lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bayar__s_p_p_s');
    }
}
