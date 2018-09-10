<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPasswardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_password', function (Blueprint $table) {
            $table->string('knr_user_id',17);
            $table->string('pwd', 255);
            $table->string('zen_pwd', 255)->nullable();
            $table->decimal('login_fail_cnt',3)->nullable();
            $table->string('guid', 64)->nullable();
            $table->dateTime('mail_send_date')->nullable();
            $table->dateTime('pwd_upd_date');
            $table->dateTime('upd_date');
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
        Schema::dropIfExists('m_password');
    }
}
