<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaisyoSyohinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('m_taisyo_syohin')) {
            return;
        }
        
        Schema::create('m_taisyo_syohin', function (Blueprint $table) {
            $table->string('category_cd', 10);
            $table->string('subcategory_cd', 10);
            $table->string('syouhin_plan_id', 15);
            $table->string('syouhin_mei', 200);
            $table->string('plan_mei', 200);
            $table->text('setumei_bun_1')->nullable();
            $table->text('setumei_bun_2')->nullable();
            $table->string('syouhin_logo_filen', 200)->nullable();
            $table->string('plan_image_filen', 200)->nullable();
            $table->char('kakakuhyouji_kbn', 2);
            $table->date('keisai_start_ymd');
            $table->date('keisai_end_ymd')->nullable();
            $table->decimal('reform_cost_10', 10)->nullable();
            $table->decimal('reform_cost_11', 10)->nullable();
            $table->decimal('reform_cost_20', 10)->nullable();
            $table->decimal('reform_cost_21', 10)->nullable();
            $table->decimal('reform_cost_30', 10)->nullable();
            $table->decimal('reform_cost_31', 10)->nullable();
            $table->decimal('reform_cost_90', 10)->nullable();
            $table->string('link_url_1', 256)->nullable();
            $table->string('link_url_1_mei', 256)->nullable();
            $table->string('link_url_2', 256)->nullable();
            $table->string('link_url_2_mei', 256)->nullable();
            $table->char('syouhin_3D_kbn', 2)->nullable();
            $table->string('syouhin_3D_plan_cd', 256)->nullable();
            $table->char('syouhin_toroku_kbn', 2);
            $table->string('kengine_plan_cd1', 50)->nullable();
            $table->string('kengine_plan_cd2', 50)->nullable();
            $table->string('enavi_mitsu_cd1', 50)->nullable();
            $table->string('enavi_mitsu_cd2', 50)->nullable();
            $table->string('regis_user_acct_cd', 17);
            $table->string('regis_terminal_ip_addr', 15);
            $table->string('upd_pgm_cd', 16);
            $table->dateTime('upd_date');
            $table->string('patch_id', 128);
            $table->primary(['category_cd', 'subcategory_cd', 'syouhin_plan_id'], 'syouhin_plan_id');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_taisyo_syohin');
    }
}
