<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableReformReqV1 extends Migration
{
    protected $tbl = 't_reform_req';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tbl)) {
            return;
        }
        
        Schema::table($this->tbl, function (Blueprint $table) {
            if (!Schema::hasColumn($this->tbl, 'company_name')) {
                $table->string('company_name', 255)->after('renraku_kbn')->nullable();
            }
            if (!Schema::hasColumn($this->tbl, 'syozokubusyo_mei')) {
                $table->string('syozokubusyo_mei', 255)->after('renraku_kbn')->nullable();
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
        if (!Schema::hasTable($this->tbl)) {
            return;
        }
        
        Schema::table($this->tbl, function (Blueprint $table) {
            if (Schema::hasColumn($this->tbl, 'company_name')) {
                $table->dropColumn('company_name');
            }
            if (Schema::hasColumn($this->tbl, 'syozokubusyo_mei')) {
                $table->dropColumn('syozokubusyo_mei');
            }
        });
    }
}
