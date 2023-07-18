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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori');
            $table->string('nik', 20)->unique();
            $table->integer('no_peserta')->unique();
            $table->string('nama', 50);
            $table->string('hp', 20);
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN'])->default('LAKI-LAKI');
            $table->date('tgl_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
            
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
