<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('NIS');
            $table->string('Nama');
            $table->string('Email')->unique();
            $table->enum('Jenis Kelamin', ['L', 'P']);
            $table->enum('Kelas', ['X', 'XI', 'XII']);
            $table->enum('Jurusan', ['TSM', 'TKR', 'AK', 'AP']);
            $table->text('Alamat');
            $table->string('Telpon');
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
        Schema::dropIfExists('siswas');
    }
}
