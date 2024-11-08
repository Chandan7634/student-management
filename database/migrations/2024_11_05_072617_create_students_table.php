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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_name', 40);
            $table->string('school', 100);
            $table->integer('monthly_fees')->nullable();
            $table->integer('yearly_fees')->nullable();
            $table->date('joining_date');
            $table->unsignedBigInteger('party_id');

            $table->foreign('party_id')->references('party_id')->on('parties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
