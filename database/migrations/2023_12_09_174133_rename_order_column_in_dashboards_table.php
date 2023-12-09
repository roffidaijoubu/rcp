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
        Schema::table('dashboards', function (Blueprint $table) {
            $table->renameColumn('order', 'order_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('dashboards', function (Blueprint $table) {
            $table->renameColumn('order_column', 'order');
        });
    }
};
