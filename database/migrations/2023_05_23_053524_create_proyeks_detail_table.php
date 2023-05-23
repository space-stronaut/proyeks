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
        Schema::create('proyeks_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyek_id');
            $table->foreign('proyek_id')->references('id')->on('proyeks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('step');
            $table->date('estimasi_tanggal_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks_detail');
    }
};
