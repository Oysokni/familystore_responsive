<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_faskq', function (Blueprint $table) {
            $table->string('faskq_id', 15);
            $table->char('syanaigai_kbn', 1);
            $table->char('faq_taisyou_kbn', 1);
            $table->date('faq_start_ymd');
            $table->date('faq_end_ymd')->nullable();
            $table->string('ask_bunrui', 50)->nullable();
            $table->text('ask_message')->nullable();
            $table->text('ques_message')->nullable();
            $table->dateTime('regis_date');
            $table->string('regis_user_acct_cd', 17);
            $table->string('regis_terminal_ip_addr', 15);
            $table->string('upd_pgm_cd', 16);
            $table->dateTime('upd_date');
            $table->string('patch_id', 128);

            $table->primary('faskq_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_faskq');
    }
}
