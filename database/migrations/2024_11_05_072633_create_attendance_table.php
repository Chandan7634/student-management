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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->date('date');
            $table->unsignedBigInteger('party_id');
            $table->unsignedBigInteger('class_id');
            $table->json('daily_attendance');

            $table->foreign('party_id')->references('party_id')->on('parties');
            $table->foreign('class_id')->references('class_id')->on('classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
