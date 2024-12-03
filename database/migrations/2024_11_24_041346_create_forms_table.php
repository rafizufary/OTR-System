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
        // Table `statuses`
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // Nama status seperti "proposed", "rejected", dll.
            $table->timestamps();
        });

        // Table `forms`
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('input_date');
            $table->string('address');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('lastedu');
            $table->string('phone');
            $table->string('companyid');
            $table->string('image');
            $table->string('laca');
            $table->string('laca_number');
            $table->string('validy');
            $table->string('scope');
            $table->string('ame_number');
            $table->string('vut');
            $table->string('hft_year');
            $table->string('sms_year');
            $table->string('etops_year');
            $table->string('rii_year');

            $table->unsignedBigInteger('status_id')->default(1); // Default ke status "pending"
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            
            $table->unsignedBigInteger('checked_by')->nullable();
            $table->foreign('checked_by')->references('id')->on('users')->onDelete('set null');   
            $table->timestamp('checked_at')->nullable();
            
            $table->unsignedBigInteger('assessment_by')->nullable();
            $table->foreign('assessment_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamp('assessment_at')->nullable();
            $table->timestamps();
        });

        // Table `training_type`
        Schema::create('training_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('forms')->onDelete('cascade');
            $table->string('course');
            $table->integer('course_year');
            $table->timestamps();
        });

        // Table `license`
        Schema::create('license', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('forms')->onDelete('cascade');
            $table->string('license_category');
            $table->integer('card_number');
            $table->timestamps();
        });

        // Table `aircraft`
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('forms')->onDelete('cascade');
            $table->string('aircraft');
            $table->timestamps();
        });

        // Table `aircraft`
        Schema::create('assessment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('forms')->onDelete('cascade');
            $table->integer('question');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
        Schema::dropIfExists('license');
        Schema::dropIfExists('training_type');
        Schema::dropIfExists('forms');
        Schema::dropIfExists('statuses');
    }
};
