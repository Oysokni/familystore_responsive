<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMLimeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_lime_user', function (Blueprint $table) {
            
            $table->string('global_id', 10);
            $table->string('shain_no', 5)->nullable();
            $table->string('e_mail', 254)->nullable();
            $table->string('user_id', 32)->nullable();
            $table->string('name_sei', 32)->nullable();
            $table->string('name_mei', 32)->nullable();
            $table->string('kana_sei', 20)->nullable();
            $table->string('kana_mei', 20)->nullable();
            $table->string('name_sei_dsp', 32)->nullable();
            $table->string('name_mei_dsp', 32)->nullable();
            $table->string('kana_sei_dsp', 20)->nullable();
            $table->string('kana_mei_dsp', 20)->nullable();
            $table->string('emp_cd', 2)->nullable();
            $table->string('title_cd', 4)->nullable();
            $table->char('company_cd', 4)->nullable();
            $table->string('company_name', 64)->nullable();
            $table->string('n_tel', 32)->nullable();
            $table->string('g_tel', 32)->nullable();
            $table->string('mobile_tel', 32)->nullable();
            $table->date('begin_date')->nullable();
            $table->date('end_date')->nullable();
            $table->primary('global_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_lime_user');
    }
}
