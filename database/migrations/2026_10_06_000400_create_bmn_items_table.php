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
        Schema::create('bmn_items', function (Blueprint $table) {
            $table->id();
            $table->string('bmn_code')->nullable();
            $table->string('register_number')->nullable();
            $table->string('item_name');
            $table->unsignedInteger('quantity')->default(1);
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('responsible_employee_id')->nullable()->constrained('employees')->nullOnDelete();
            $table->string('responsible_name');
            $table->date('acquisition_date');
            $table->string('acquisition_source');
            $table->string('condition');
            $table->boolean('requires_decree')->default(false);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmn_items');
    }
};
