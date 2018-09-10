<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTSyoutaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_syoutai', function (Blueprint $table) {
            $table->string('knr_user_id', 17);
            $table->string('syoutai_mail', 254);
            $table->char('syoutai_cd', 10);
            $table->char('kankei_flg', 2);
            $table->string('syoutai_sei', 40);
            $table->string('syoutai_mei', 40);
            $table->date('syoutai_cd_gen_ymd')->nullable();
            $table->date('syoutai_cd_lmt_ymd')->nullable();
            $table->char('syoutai_mail_status', 2)->nullable();
            $table->date('syoutai_regis_ymd')->nullable();
            $table->dateTime('upd_date');
            $table->string('patch_id', 128)->nullable();
            $table->primary(['knr_user_id', 'syoutai_mail', 'syoutai_cd']);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_syoutai');
    }
}
