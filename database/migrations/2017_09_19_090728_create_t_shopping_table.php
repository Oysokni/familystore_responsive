<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('t_shopping')) {
            return;
        }
        
        Schema::create('t_shopping', function (Blueprint $table) {
            $table->string('knr_user_id', 17);
            $table->string('kento_plan_id', 15);
            $table->string('category_cd', 10);
            $table->string('subcategory_cd', 10);
            $table->string('syouhin_plan_id', 15);
            $table->decimal('syahan_kakeritsu', 3);
            $table->decimal('reform_cost_10_1', 10)->nullable();
            $table->decimal('reform_cost_20', 10)->nullable();
            $table->decimal('reform_cost_30', 10)->nullable();
            $table->decimal('reform_cost_90', 10)->nullable();
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
            $table->date('kouji_k_date_1')->nullable();
            $table->date('kouji_k_date_2')->nullable();
            $table->date('kouji_k_date_3')->nullable();
            $table->char('req_form_status', 2);
            $table->date('plan_regis_date')->nullable();
            $table->date('plan_upd_date')->nullable();
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
        Schema::dropIfExists('t_shopping');
    }
}
