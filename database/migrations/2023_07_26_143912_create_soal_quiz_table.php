<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('soal_quiz', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_jenis_soal');
            $table->string('isi_soal_quiz');
            $table->string('jawaban_benar');
            $table->string('jawaban_opsional_1');
            $table->string('jawaban_opsional_2');
            $table->string('jawaban_opsional_3');
            $table->timestamps();
            $table->unsignedBigInteger('create_by');
            $table->unsignedBigInteger('update_by');
            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('update_by')->references('id')->on('users');

            $table->foreign('id_jenis_soal')->references('id')->on('jenis_soal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_quiz');
    }
};
