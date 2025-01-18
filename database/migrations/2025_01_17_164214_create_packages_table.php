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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('image');
            $table->string('itinerary');
            $table->string('duration');
            $table->string('inclusion');
            $table->string('exclusion');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')
            ->references('id')
            ->on('destinations')
            ->onDelete('cascade');
            $table->softDeletes();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};