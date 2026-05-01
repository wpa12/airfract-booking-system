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
            $table->string('type')->index();
            $table->string('description')->nullable();
            $table->string('registration')->unique();
            $table->foreignId('school_id')->nullable()->constrained('schools')->onDelete('cascade');
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
