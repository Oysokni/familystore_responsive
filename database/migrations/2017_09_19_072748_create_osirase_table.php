<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsiraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_osirase', function (Blueprint $table) {
            $table->string('osirase_id', 15);
            $table->char('syanaigai_kbn', 1);
            $table->date('osirase_start_ymd');
            $table->date('osirase_end_ymd')->nullable();
            $table->string('osirase_title')->nullable();
            $table->text('osirase_message')->nullable();
            $table->dateTime('regis_date');
            $table->string('regis_user_acct_cd', 17);
            $table->string('regis_terminal_ip_addr', 15);
            $table->string('upd_pgm_cd', 16);
            $table->dateTime('upd_date');
            $table->string('patch_id', 128);

            $table->primary('osirase_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_osirase');
    }
}
