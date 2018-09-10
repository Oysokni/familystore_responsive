<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAnkenKbnTShintikuReqTable extends Migration
{
    protected $tbl = 't_shintiku_req';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table($this->tbl, function ($table) {
            $table->string('anken_kbn', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table($this->tbl, function ($table) {
            $table->string('anken_kbn', 100)->change();
        });
    }
}
