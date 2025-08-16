<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('explore_campaigns', function (Blueprint $table) {
            $table->float('progress')->default(0);
        });
    }

    public function down()
    {
        Schema::table('explore_campaigns', function (Blueprint $table) {
            $table->dropColumn('progress');
        });
    }
};
