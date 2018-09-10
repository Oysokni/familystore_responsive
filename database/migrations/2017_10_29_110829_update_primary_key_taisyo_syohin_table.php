<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePrimaryKeyTaisyoSyohinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_taisyo_syohin', function (Blueprint $table) {
            $table->dropPrimary();
        });
        Schema::table('m_taisyo_syohin', function (Blueprint $table) {
            $table->primary('syouhin_plan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_taisyo_syohin', function (Blueprint $table) {
            $table->dropPrimary();
        });
        Schema::table('m_taisyo_syohin', function (Blueprint $table) {
            $table->primary(['category_cd', 'subcategory_cd', 'syouhin_plan_id'], 'syouhin_plan_id');
        });
    }
}
