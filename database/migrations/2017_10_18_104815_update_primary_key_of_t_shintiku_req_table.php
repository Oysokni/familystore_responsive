<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePrimaryKeyOfTShintikuReqTable extends Migration
{
    protected $tbl = 't_shintiku_req';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tbl, function (Blueprint $table) {
            if (!Schema::hasColumn($this->tbl, 'shintiku_id')) {
                $table->dropPrimary();
            }
        });
        Schema::table($this->tbl, function (Blueprint $table) {
            if (!Schema::hasColumn($this->tbl, 'shintiku_id')) {
                $table->bigIncrements('shintiku_id')->first();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tbl, function (Blueprint $table) {
            if (Schema::hasColumn($this->tbl, 'shintiku_id')) {
                $table->dropColumn('shintiku_id');
            }
        });
        Schema::table($this->tbl, function (Blueprint $table) {
            if (Schema::hasColumn($this->tbl, 'shintiku_id')) {
                $table->primary('knr_user_id');
            }
        });
    }
}
