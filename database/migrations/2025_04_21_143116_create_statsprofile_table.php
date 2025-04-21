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
    Schema::create('statsprfoile', function (Blueprint $table) {
        $table->id();
        $table->integer('peserta_didik');
        $table->integer('rombel');
        $table->integer('guru_tenaga_kependidikan');
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
        Schema::dropIfExists('statprofile');
    }
};
