<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReformNoColumnTReformReq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('t_reform_req')) {
            return;
        }
        Schema::table('t_reform_req', function (Blueprint $table) {
            if (!Schema::hasColumn('t_reform_req', 'reform_no')) {
                $table->string('reform_no')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('t_reform_req')) {
            return;
        }
        Schema::table('t_reform_req', function (Blueprint $table) {
            if (Schema::hasColumn('t_reform_req', 'reform_no')) {
                $table->dropColumn('reform_no');
            }
        });
    }
}
