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
        Schema::create('payment_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('type')->nullable();
            $table->text('card_name')->nullable();
            $table->text('card_number')->nullable();
            $table->date('exp_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_information');
    }
};
