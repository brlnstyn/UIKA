<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesmasDeskripsiProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesmas_deskripsi_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('akreditasi');
            $table->string('prospek_lulusan');
            $table->string('photo');
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
        Schema::dropIfExists('kesmas_deskripsi_prodi');
    }
}
