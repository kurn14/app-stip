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
        Schema::create('circulations', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->unique();
            $table->morphs('borrower');
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('loaned_by')->constrained('employees');
            $table->foreignId('returned_by')->nullable()->constrained('employees');
            $table->date('loan_date');
            $table->date('due_date');
            $table->date('return_date')->nullable();
            $table->string('status')->default('borrowed');
            $table->string('return_condition')->nullable();
            $table->unsignedSmallInteger('late_days')->nullable();
            $table->unsignedInteger('fine_amount')->default(0);
            $table->boolean('fine_paid')->default(false);
            $table->timestamp('fine_paid_at')->nullable();
            $table->text('officer_note')->nullable();
            $table->timestamps();

            $table->index(['status', 'due_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circulations');
    }
};
