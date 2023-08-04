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
        Schema::create('jenis_soal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_soal');
            $table->timestamps();
            $table->unsignedBigInteger('create_by');
            $table->unsignedBigInteger('update_by');
            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('update_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_soal');
    }
};
