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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->unsignedBigInteger('pengembang_proyek');
            $table->foreign('pengembang_proyek')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_pengembangan');
            $table->string('wilayah_pengembangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
