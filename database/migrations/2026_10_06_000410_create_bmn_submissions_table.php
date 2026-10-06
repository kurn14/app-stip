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
        Schema::create('bmn_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('submitted_by')->constrained('employees');
            $table->foreignId('verified_by')->nullable()->constrained('employees');
            $table->foreignId('bmn_item_id')->nullable()->constrained('bmn_items')->nullOnDelete();
            $table->string('item_name');
            $table->string('bmn_code')->nullable();
            $table->string('register_number')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->date('acquisition_date');
            $table->string('acquisition_source');
            $table->string('condition');
            $table->string('responsible_name');
            $table->boolean('requires_decree')->default(false);
            $table->string('status')->default('draft')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmn_submissions');
    }
};
