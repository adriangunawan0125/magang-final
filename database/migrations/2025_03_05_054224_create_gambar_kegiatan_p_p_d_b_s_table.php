<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('gambar_kegiatan_p_p_d_b', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gambar_kegiatan_p_p_d_b');
    }
};
