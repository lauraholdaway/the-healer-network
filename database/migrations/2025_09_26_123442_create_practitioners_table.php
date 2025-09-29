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
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
                 // Basic info
            $table->string('user_id');
            $table->string('primary_contact_number');
            $table->string('mobile_number')->nullable();
            $table->string('address')->nullable();
            $table->string('social_media_handle')->nullable();
            $table->string('website')->nullable();

            // Modality (multiple selections possible -> JSON)
            $table->json('modalities')->nullable();
            // Practice location (for in-person sessions)
            $table->text('practice_location')->nullable();

            $table->text('about')->nullable();

            // Experience
            $table->string('practicing_since')->nullable(); // e.g. "Hasn't started yet" OR year
            $table->integer('clients_per_month')->default(0);
            $table->integer('free_trial_sessions')->default(0);
            $table->boolean('happy_to_provide_free_session')->default(false);

            // Referral
            $table->string('referred_by')->nullable();

            // Authentication
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practitioners');
    }
};
