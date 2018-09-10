<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKentoPlanNoColumnTReformReq extends Migration
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
            if (!Schema::hasColumn('t_reform_req', 'kento_plan_no')) {
                $table->string('kento_plan_no',15)->nullable();
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
            if (Schema::hasColumn('t_reform_req', 'kento_plan_no')) {
                $table->dropColumn('kento_plan_no');
            }
        });
        
    }
}
