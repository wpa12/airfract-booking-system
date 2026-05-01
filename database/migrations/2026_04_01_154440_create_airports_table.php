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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); // description of the airport
            $table->string('icao_code')->unique(); // ICAO Code for airport
            $table->decimal('landing_fee')->default(0); // landing fee at the airport
            $table->decimal('fuel_price')->default(0); // fuel price at the airport
            $table->foreignId('address_id')->nullable()->nullOnDelete(); // if the address is accidentally deleted it won't delete the airport
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
