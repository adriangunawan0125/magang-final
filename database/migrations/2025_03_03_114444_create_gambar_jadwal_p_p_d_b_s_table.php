<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('gambar_jadwal_p_p_d_b_s', function (Blueprint $table) {
        $table->id();
        $table->string('gambar'); // Menyimpan path gambar jadwal
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
        Schema::dropIfExists('gambar_jadwal_p_p_d_b_s');
    }
};
