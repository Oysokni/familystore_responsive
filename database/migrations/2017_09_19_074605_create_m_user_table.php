<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->string('knr_user_id', 17);
            $table->string('emp_cd', 2);
            $table->string('mail', 254);
            $table->string('mail_2', 254)->nullable();
            $table->string('local_id', 15)->nullable();
            $table->char('admin_flg', 1);
            $table->char('kankei_flg', 2);
            $table->string('sei_local', 40);
            $table->string('mei_local', 40);
            $table->string('sei_kana', 100)->nullable();
            $table->string('mei_kana', 100)->nullable();
            $table->date('birth_ymd')->nullable();
            $table->char('seibetu_kbn', 1)->nullable();
            $table->decimal('syahan_kakeritsu', 5, 2);
            $table->string('company_cd', 4)->nullable();
            $table->string('company_mei', 100)->nullable();
            $table->string('zip_no', 10);
            $table->string('todouhuken_mei', 4);
            $table->string('sikutyouson_mei', 50);
            $table->string('tyoumei', 50);
            $table->string('tat_mei', 50)->nullable();
            $table->string('idm_denwa_no', 32)->nullable();
            $table->string('idm_keitai_tel', 32)->nullable();
            $table->date('pre_regis_ymd')->nullable();
            $table->date('pre_regis_lmt_ymd')->nullable();
            $table->date('regis_ymd')->nullable();
            $table->date('regis_lmt_ymd');
            $table->string('syokai_knr_user_id', 20);
            $table->char('touroku_cd', 10);
            $table->char('regis_status', 2);
            $table->char('kengine_status', 2);
            $table->char('enavi_status', 2);
            $table->char('lixil_online_status', 2);
            $table->char('renkei_status_1', 2);
            $table->char('renkei_status_2', 2);
            $table->char('renkei_status_3', 2);
            $table->char('genba_zyusyo_flg', 1);
            $table->char('guid', 36);
            $table->char('del_flg', 1)->nullable();
            $table->dateTime('last_login_date')->nullable();
            $table->dateTime('upd_date')->nullable();
            $table->string('upd_user_id', 17)->nullable();
            $table->string('upd_terminal_ip_addr', 15)->nullable();
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
        Schema::dropIfExists('m_user');
    }
}
