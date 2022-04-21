<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bayars', function (Blueprint $table) {
            $table->id();
            $table->integer('transaksi_id');
            $table->boolean('siswa_id');
            $table->boolean('jan');
            $table->boolean('feb');
            $table->boolean('mar');
            $table->boolean('apr');
            $table->boolean('mei');
            $table->boolean('jun');
            $table->boolean('jul');
            $table->boolean('agust');
            $table->boolean('sept');
            $table->boolean('okt');
            $table->boolean('nov');
            $table->boolean('des');
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
        Schema::dropIfExists('data_bayars');
    }
}
