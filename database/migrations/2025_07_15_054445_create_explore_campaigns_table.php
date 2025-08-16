<?php

// database/migrations/xxxx_xx_xx_create_explore_campaigns_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('explore_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('goal_amount');
            $table->unsignedBigInteger('amount_raised')->default(0);
            $table->unsignedInteger('backers')->default(0);
            $table->string('category'); // animal, children, etc.
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('explore_campaigns');
    }
};
