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
        Schema::create('org_type_cate', function (Blueprint $table) {
            $table->id();
            $table->string('org_type_name')->nullable();
            $table->string('org_status')->nullable();
            $table->string('org_cate_name')->nullable();
            $table->string('org_parent_id')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');

    }
};
