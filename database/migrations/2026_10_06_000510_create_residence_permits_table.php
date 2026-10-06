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
        Schema::create('residence_permits', function (Blueprint $table) {
            $table->id();
            $table->string('permit_number')->nullable()->unique();
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('official_residence_id')->constrained('official_residences');
            $table->foreignId('submitted_by')->constrained('employees');
            $table->foreignId('verified_by')->nullable()->constrained('employees');
            $table->foreignId('approved_by')->nullable()->constrained('employees');
            $table->date('occupancy_start');
            $table->date('occupancy_end');
            $table->text('occupancy_notes')->nullable();
            $table->string('status')->default('draft')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residence_permits');
    }
};
