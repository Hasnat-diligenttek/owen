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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('display_name')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('status')->nullable();
            $table->string('store_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
