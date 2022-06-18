<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historis', function (Blueprint $table) {
            $table->id();
            $table->integer('transaksi_id');
            $table->integer('petugas_id');
            $table->integer('siswa_id');
            $table->string('nis');
            $table->integer('bulan_bayar');
            $table->integer('tahun_bayar');
            $table->string('jumlah_bayar');
            $table->date('tanggal_bayar');
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
        Schema::dropIfExists('historis');
    }
}
