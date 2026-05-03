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
            $table->morphs('bookable');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('flight_school_id')->constrained('flight_schools')->onDelete('cascade');
            $table->datetime('booking_date_time_start'); // date and time plane is due to be out
            $table->datetime('booking_date_time_end'); // date and time the plane is due to be back
            $table->string('booking_status')->default('pending');
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
