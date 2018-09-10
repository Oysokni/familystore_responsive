<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTShintikuReqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_shintiku_req', function (Blueprint $table) {
            $table->string('knr_user_id', 17);
            $table->string('kento_plan_id', 15);
            $table->char('syoukai_kbn', 2);
            $table->string('shimei', 80);
            $table->string('shimei_kana', 200)->nullable();
            $table->date('birth_ymd')->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('syozokubusyo_mei', 100)->nullable();
            $table->char('syain_kbn', 1);
            $table->string('mail', 254);
            $table->string('idm_denwa_no', 32)->nullable();
            $table->string('idm_keitai_tel', 32)->nullable();
            $table->char('renrakusaki_kbn', 1);
            $table->char('renraku_kbn', 2)->nullable();
            $table->string('s_sei_local', 40)->nullable();
            $table->string('s_mei_local', 40)->nullable();
            $table->string('s_sei_kana', 100)->nullable();
            $table->string('s_mei_kana', 100)->nullable();
            $table->date('s_birth_ymd')->nullable();
            $table->string('s_mail', 254)->nullable();
            $table->string('s_idm_denwa_no', 32)->nullable();
            $table->string('s_idm_keitai_tel', 32)->nullable();
            $table->string('s_zip_no', 10)->nullable();
            $table->string('s_todouhuken_mei', 4)->nullable();
            $table->string('s_sikutyouson_mei', 50)->nullable();
            $table->string('s_tyoumei', 50)->nullable();
            $table->string('s_tat_mei', 50)->nullable();
            $table->string('bkn_zip_no', 10)->nullable();
            $table->string('bkn_todouhuken_mei', 4)->nullable();
            $table->string('bkn_sikutyouson_mei', 50)->nullable();
            $table->string('bkn_tyoumei', 50)->nullable();
            $table->string('bkn_tat_mei', 50)->nullable();
            $table->char('kibotaio_kbn', 5);
            $table->char('tyuko_flg', 1);
            $table->char('anken_kbn', 2);
            $table->char('tochi_flg', 1)->nullable();
            $table->char('yosan_all_kbn', 2)->nullable();
            $table->decimal('yosan_all', 6)->nullable();
            $table->char('yosan_month_kbn', 2)->nullable();
            $table->decimal('yosan_month', 3)->nullable();
            $table->char('syunko_ziki_kbn', 2)->nullable();
            $table->char('kouhou_kbn', 2)->nullable();
            $table->string('kibo_builder_1', 4)->nullable();
            $table->string('kibo_builder_2', 4)->nullable();
            $table->string('kibo_builder_3', 4)->nullable();
            $table->string('kibo_builder_4', 4)->nullable();
            $table->string('kibo_builder_5', 4)->nullable();
            $table->string('kibo_builder_6', 4)->nullable();
            $table->string('kibo_builder_7', 4)->nullable();
            $table->string('kibo_builder_8', 4)->nullable();
            $table->string('kibo_builder_9', 4)->nullable();
            $table->string('kibo_builder_10', 4)->nullable();
            $table->string('kibo_builder_11', 4)->nullable();
            $table->string('kibo_builder_12', 4)->nullable();
            $table->string('kibo_builder_13', 4)->nullable();
            $table->string('kibo_builder_14', 4)->nullable();
            $table->string('kibo_builder_15', 4)->nullable();
            $table->char('req_form_status', 2);
            $table->string('req_memo', 500)->nullable();
            $table->dateTime('upd_date');
            $table->string('patch_id', 128)->nullable();

            $table->primary('knr_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_shintiku_req');
    }
}
