<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();

            // Campaign relation
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->string('campaign_type')->nullable();


            // If donor is logged in
            $table->unsignedBigInteger('donor_id')->nullable(); // from donor login

            // If guest user
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable(); // indian / non-indian

            $table->integer('amount');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
