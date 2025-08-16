<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('volunteer_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('image')->nullable();
            $table->date('application_last_date');
            $table->date('activity_start_date');
            $table->string('duration')->nullable(); // like '3 Days'
            $table->string('category')->nullable(); // like 'Generic Level Activities'
            $table->text('details')->nullable();
            $table->string('qualification')->nullable(); // like 'Others'
            $table->string('gender')->nullable(); // like 'Any'
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_events');
    }
};
