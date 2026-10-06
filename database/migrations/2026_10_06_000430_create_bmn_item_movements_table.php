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
        Schema::create('bmn_item_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bmn_item_id')->constrained('bmn_items');
            $table->foreignId('from_room_id')->nullable()->constrained('rooms');
            $table->foreignId('to_room_id')->nullable()->constrained('rooms');
            $table->string('source');
            $table->string('reason')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmn_item_movements');
    }
};
