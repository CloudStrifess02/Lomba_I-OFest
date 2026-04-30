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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('booking_id')->unique();


            $table->foreignId('technician_id')->constrained('technicians')->onDelete('cascade');

            $table->string('diag_id')->nullable(); 

            // Detail Jadwal Kedatangan
            $table->dateTime('schedule'); 

            $table->text('address');
            $table->string('city')->nullable();
            
            $table->text('notes')->nullable();

            $table->string('status')->default('pending');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
