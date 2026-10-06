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
        Schema::create('bmn_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bmn_item_id')->constrained('bmn_items');
            $table->foreignId('requested_by')->constrained('employees');
            $table->foreignId('verified_by')->nullable()->constrained('employees');
            $table->foreignId('from_room_id')->constrained('rooms');
            $table->foreignId('destination_room_id')->nullable()->constrained('rooms');
            $table->date('return_date');
            $table->text('reason');
            $table->string('condition');
            $table->text('damage_note')->nullable();
            $table->string('status')->default('draft')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmn_returns');
    }
};
