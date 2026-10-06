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
            $table->string('booking_number')->unique();
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('unit_id')->constrained('units');
            $table->morphs('requester');
            $table->foreignId('responsible_lecturer_id')->constrained('employees');
            $table->uuid('recurrence_series_id')->nullable()->index();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('purpose');
            $table->unsignedSmallInteger('participant_count');
            $table->string('class_group');
            $table->string('status')->default('draft')->index();
            $table->timestamp('submitted_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('external_institution')->nullable();
            $table->timestamps();

            $table->index(['room_id', 'start_at']);
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
