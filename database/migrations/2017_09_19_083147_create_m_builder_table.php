<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMBuilderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_builder', function (Blueprint $table) {
            $table->string('builder_id',4);
            $table->string('builer_mei',120);
            $table->string('builer_mei_kana',200);
            $table->date('start_ymd');
            $table->date('end_ymd')->nullable();
            $table->string('zip_no',10);
            $table->string('todouhuken_mei',4);
            $table->string('sikutyouson_mei',50);
            $table->string('tyoumei',50);
            $table->string('tat_mei',50)->nullable();
            $table->string('builer_busyo_mei',100)->nullable();
            $table->string('builer_mail',254)->nullable();
            $table->string('builer_tel',13);
            $table->string('builer_fax',13)->nullable();
            $table->string('builder_url',256)->nullable();
            $table->char('eigyo_area_kbn',47);
            $table->char('taiou_kbn',6);
            $table->string('bdb_cd',10)->nullable();
            $table->string('lcr_cd',5)->nullable();
            $table->string('mdm_houjin_cd',10)->nullable();
            $table->integer('display_order_1');
            $table->integer('display_order_2');
            $table->char('benefit_flg',3);
            $table->date('regis_ymd');
            $table->dateTime('upd_date');
            $table->string('upd_user_id',17);
            $table->string('upd_terminal_ip_addr',15);
            $table->string('patch_id',128)->nullable();
            $table->primary('builder_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_builder');
    }
}
