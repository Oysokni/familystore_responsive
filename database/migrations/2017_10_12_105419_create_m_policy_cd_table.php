<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPolicyCdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_policy_cd', function (Blueprint $table) {
            
            $table->increments('policy_id');
            $table->string('company_cd',4);
            $table->string('reform',255);
            $table->string('builder_intro',255);
            $table->dateTime('upd_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_policy_cd');
    }
}
