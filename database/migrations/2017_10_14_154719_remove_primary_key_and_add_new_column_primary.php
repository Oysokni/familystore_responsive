<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePrimaryKeyAndAddNewColumnPrimary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_shopping', function (Blueprint $table) {
            $table->dropPrimary();
        });
        Schema::table('t_shopping', function (Blueprint $table) {
            $table->bigIncrements('shopping_id')->first();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_shopping', function (Blueprint $table) {
            $table->dropColumn('shopping_id');
        });
        Schema::table('t_shopping', function (Blueprint $table) {
            $table->primary('knr_user_id');
        });
    }
}
