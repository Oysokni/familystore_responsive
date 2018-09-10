<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMSyoutaiKanriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_syoutai_kanri', function (Blueprint $table) {
            $table->string('knr_user_id', 17);
            $table->date('syoutai_start_ymd');
            $table->date('syoutai_end_ymd')->nullable();
            $table->string('syoutai_cnt', 2);
            $table->string('syoutai_lmt_cnt', 2);
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
        Schema::dropIfExists('m_syoutai_kanri');
    }
}
