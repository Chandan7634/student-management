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
        Schema::create('revenues', function (Blueprint $table) {
            $table->id('rev_id');
            $table->unsignedBigInteger('party_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('total_amount');
            $table->integer('paid_amount');
            $table->integer('due_amount')->default(0);
            $table->date('due_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('month')->enum(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
            $table->integer('installment_count')->default(0);
            $table->timestamps();

            $table->foreign('party_id')->references('party_id')->on('parties');
            $table->foreign('student_id')->references('student_id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};
