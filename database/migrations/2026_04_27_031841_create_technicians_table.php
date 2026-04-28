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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();

            // Relasi ke users (1 user = 1 technician profile)
            $table->foreignId('user_id')
                  ->unique()
                  ->constrained()
                  ->onDelete('cascade');

            // Info teknisi / toko
            $table->string('shop_name')->nullable();
            $table->text('description')->nullable();

            // Rating system
            $table->decimal('rating', 2, 1)->default(0); // contoh: 4.5
            $table->integer('total_reviews')->default(0);

            // Status
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_available')->default(true);

            // Pricing (optional range kasar)
            $table->integer('price_min')->nullable();
            $table->integer('price_max')->nullable();

            // Lokasi (penting untuk nearby search)
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};