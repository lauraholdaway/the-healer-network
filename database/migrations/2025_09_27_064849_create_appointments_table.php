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
        Schema::create('appointments', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('user_id');   // user who booked
                    $table->unsignedBigInteger('doctor_id'); // doctor assigned
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('session')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment')->nullable();
            $table->string('currency')->nullable();
            $table->string('replay')->nullable();
            $table->string('Zomemeting')->nullable();
            $table->text('zoom_join_url')->nullable();
            $table->text('zoom_start_url')->nullable();
            $table->string('rating')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
                    $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
                    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
