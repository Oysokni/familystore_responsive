<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Reform;

class AlterTableReformReqV2 extends Migration
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
        
        //remove all data
        Reform::truncate();
        
        Schema::table($this->tbl, function (Blueprint $table) {
            $table->dropPrimary();
        });
        
        Schema::table($this->tbl, function (Blueprint $table) {
            if (!Schema::hasColumn($this->tbl, 'reform_id')) {
                $table->bigIncrements('reform_id')->first();
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
            if (Schema::hasColumn($this->tbl, 'reform_id')) {
                $table->dropColumn('reform_id');
            }
        });
        
        Schema::table($this->tbl, function (Blueprint $table) {
            if (Schema::hasColumn($this->tbl, 'knr_user_id')) {
                $table->primary('knr_user_id');
            }
        });
    }
}
