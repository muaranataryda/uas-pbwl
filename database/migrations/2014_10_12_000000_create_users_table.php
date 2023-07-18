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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('nama', 100);
            $table->string('hp', 25);
            $table->text('alamat')->nullable();
            $table->enum('role', ['ADMIN', 'PANITIA'])->default('PANITIA');
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
