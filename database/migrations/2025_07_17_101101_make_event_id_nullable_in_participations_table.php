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
        Schema::table('participations', function (Blueprint $table) {
            $table->dropForeign(['event_id']); // Drop old FK
            $table->unsignedBigInteger('event_id')->nullable()->change(); // Make nullable
            $table->foreign('event_id')->references('id')->on('volunteer_events')->onDelete('cascade'); // Recreate FK
        });
    }

    public function down(): void
    {
        Schema::table('participations', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->unsignedBigInteger('event_id')->nullable(false)->change();
            $table->foreign('event_id')->references('id')->on('volunteer_events')->onDelete('cascade');
        });
    }
};
