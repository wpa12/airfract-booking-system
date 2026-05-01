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
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['single', 'multi', 'jet'])->default('single');
            $table->string('make')->nullable()->index();
            $table->string('model')->nullable();
            $table->string('description')->nullable();
            $table->string('registration')->unique();
            $table->foreignId('engine_type_id')->nullable()->constrained('engine_types')->nullOnDelete();
            $table->decimal('rental_price_per_hour')->default(0);
            $table->enum('fuel_type', ['avgas', 'jetA1'])->default('avgas');
            $table->foreignId('flight_school_id')->nullable()->constrained('flight_schools')->onDelete('cascade');
            $table->boolean('in_service')->default(true);
            $table->integer('current_hours')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
    }
};
