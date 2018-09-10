<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableShintikuReqV1 extends Migration
{
    protected $tbl = 't_shintiku_req';
    
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
            if (!Schema::hasColumn($this->tbl, 'regis_date')) {
                $table->dateTime('regis_date')->nullable()->after('req_form_status');
            }
            if (!Schema::hasColumn($this->tbl, 'seshu_renraku')) {
                $table->char('seshu_renraku', 2)->nullable()->after('renraku_kbn');
            }
            if (Schema::hasColumn($this->tbl, 'renraku_kbn')) {
                $table->string('renraku_kbn', 3)->change();
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
            if (Schema::hasColumn($this->tbl, 'regis_date')) {
                $table->dropColumn('regis_date');
            }
            if (Schema::hasColumn($this->tbl, 'seshu_renraku')) {
                $table->dropColumn('seshu_renraku');
            }
            if (Schema::hasColumn($this->tbl, 'renraku_kbn')) {
                $table->string('renraku_kbn', 2)->change();
            }
        });
    }
}
