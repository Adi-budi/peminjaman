<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penggunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('nim',50);
            $table->string('nama',255);
            $table->string('nomor_telp',50);
            $table->string('nomor_telp',50);
            $table->string('keperluan',255);
            $table->foreignId('alats');
            $table->foreignId('ruangans');
            $table->string('status');
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
               Schema::dropIfExists('penggunas');
    }
}
