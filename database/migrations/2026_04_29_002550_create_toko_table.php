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
        Schema::create('toko', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kategori_toko_id')->constrained('kategori_toko')->onDelete('cascade');

            $table->string('nama_toko');
            $table->string('alamat');
            $table->string('kota');

            $table->string('foto_cover')->nullable(); 
            $table->string('logo_toko')->nullable();

            $table->decimal('rating', 2, 1)->default(0);
            $table->boolean('is_verified')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko');
    }
};
