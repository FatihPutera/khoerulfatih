<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pinjams', function (Blueprint $table) {
            $table->string('id',30);
            $table->date('tgl_pinjam');
            $table->date('tgl_batas');
            $table->date('tgl_kembali');
            $table->string('status',2);
            $table->string('nis',30);
            $table->string('id_buku',30);
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
        Schema::dropIfExists('tbl_pinjams');
    }
}
