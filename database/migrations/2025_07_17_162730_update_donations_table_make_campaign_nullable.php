<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable()->change();
            $table->string('campaign_type')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable(false)->change();
            $table->string('campaign_type')->nullable(false)->change();
        });
    }
};

