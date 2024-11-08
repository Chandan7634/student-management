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
        Schema::create('parties', function (Blueprint $table) {
            $table->id('party_id');
            $table->string('party_name');
            $table->string('email', 40);
            $table->string('phone', 12);
            $table->string('address');
            $table->string('city', 20);
            $table->string('district', 20);
            $table->string('state', 35);
            $table->string('GST', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
