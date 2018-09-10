<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTReformReqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('t_reform_req')) {
            return;
        }
        
        Schema::create('t_reform_req', function (Blueprint $table) {
            $table->string('knr_user_id', 17);
            $table->string('kento_plan_id', 15);
            $table->string('category_cd', 10);
            $table->string('subcategory_cd', 10);
            $table->string('syouhin_plan_id', 15);
            $table->string('syouhin_mei', 200);
            $table->string('plan_mei', 200);
            $table->char('taisyou_kbn', 2);
            $table->string('shimei', 80);
            $table->string('shimei_kana', 200);
            $table->date('birth_ymd')->nullable();
            $table->char('renrakusaki_kbn', 1);
            $table->char('renraku_kbn', 3)->nullable();
            $table->string('mail', 254);
            $table->string('idm_denwa_no', 32)->nullable();
            $table->string('idm_keitai_tel', 32)->nullable();
            $table->string('zip_no', 10);
            $table->string('todouhuken_mei', 4);
            $table->string('sikutyouson_mei', 50);
            $table->string('tyoumei', 50);
            $table->string('tat_mei', 50)->nullable();
            $table->string('bkn_zip_no', 10);
            $table->string('bkn_todouhuken_mei', 4);
            $table->string('bkn_sikutyouson_mei', 50);
            $table->string('bkn_tyoumei', 50);
            $table->string('bkn_tat_mei', 50)->nullable();
            $table->char('tatsyurui_kbn', 2);
            $table->char('tiknensu_kbn', 2)->nullable();
            $table->char('reform_yosan_kbn', 2)->nullable();
            $table->decimal('syahan_kakeritsu', 3);
            $table->decimal('reform_cost_10_1', 10)->nullable();
            $table->decimal('reform_cost_20', 10)->nullable();
            $table->decimal('reform_cost_30', 10)->nullable();
            $table->decimal('reform_cost_90', 10)->nullable();
            $table->decimal('reform_mitsu_all', 10)->nullable();
            $table->decimal('reform_jikkou_all', 10)->nullable();
            $table->char('reform_bui', 20)->nullable();
            $table->char('reform_ziki_kbn', 2)->nullable();
            $table->string('kengine_plan_cd1', 50)->nullable();
            $table->string('kengine_plan_cd2', 50)->nullable();
            $table->string('kengine_plan_cd3', 50)->nullable();
            $table->string('enavi_mitsu_cd1', 50)->nullable();
            $table->string('enavi_mitsu_cd2', 50)->nullable();
            $table->string('enavi_mitsu_cd3', 50)->nullable();
            $table->string('enavi_mitsu_cd4', 50)->nullable();
            $table->date('gencyo_k_date_1')->nullable();
            $table->date('gencyo_k_date_2')->nullable();
            $table->date('gencyo_k_date_3')->nullable();
            $table->date('gencyo_k_date_4')->nullable();
            $table->date('gencyo_k_date_5')->nullable();
            $table->date('kouji_k_date_1')->nullable();
            $table->date('kouji_k_date_2')->nullable();
            $table->date('kouji_k_date_3')->nullable();
            $table->date('kouji_k_date_4')->nullable();
            $table->date('kouji_k_date_5')->nullable();
            $table->date('kouji_k_date_6')->nullable();
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
        Schema::dropIfExists('t_reform_req');
    }
}
