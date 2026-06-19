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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();

            // Foreign key relation to the users table
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('pin', 16);

            // Status flags and financial tracking
            $table->boolean('is_active')->default(true);
            $table->decimal('paid_price', 10, 2)->default(250.00);

            // Encrypted or flexible JSON payload (Card number, expiry, CVV, provider info)
            $table->json('card_details');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
