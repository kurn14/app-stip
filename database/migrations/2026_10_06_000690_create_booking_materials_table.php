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
        Schema::create('booking_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('material_id')->constrained('materials');
            $table->decimal('qty_requested', 12, 2);
            $table->decimal('qty_approved', 12, 2)->nullable();
            $table->decimal('qty_used', 12, 2)->nullable();
            $table->decimal('qty_returned', 12, 2)->nullable();
            $table->text('condition_note')->nullable();
            $table->timestamps();

            $table->unique(['booking_id', 'material_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_materials');
    }
};
