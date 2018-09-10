<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableReformReqV3 extends Migration
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
            if (!Schema::hasColumn($this->tbl, 'kibo_date')) {
                $table->string('kibo_date', 2)->nullable()->after('req_form_status');
            }
            if (!Schema::hasColumn($this->tbl, 'regis_date')) {
                $table->dateTime('regis_date')->nullable()->after('req_form_status');
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
            if (Schema::hasColumn($this->tbl, 'kibo_date')) {
                $table->dropColumn('kibo_date');
            }
            if (Schema::hasColumn($this->tbl, 'regis_date')) {
                $table->dropColumn('regis_date');
            }
        });
    }
}
