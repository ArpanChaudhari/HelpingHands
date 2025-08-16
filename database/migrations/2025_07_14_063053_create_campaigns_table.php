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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // Campaign title
            $table->string('slug')->unique();         // Used in URLs
            $table->string('image');                  // Image path
            $table->text('description')->nullable();  // Description
            $table->integer('amount_raised')->default(0); // Raised amount
            $table->integer('backers')->default(0);       // Number of backers
            $table->integer('progress')->default(0);      // Progress bar (0-100%)
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
