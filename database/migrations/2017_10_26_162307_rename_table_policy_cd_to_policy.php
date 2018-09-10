<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTablePolicyCdToPolicy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('m_policy_cd') || Schema::hasTable('m_policy')) {
            return;
        }

        Schema::rename('m_policy_cd', 'm_policy');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('m_policy') || Schema::hasTable('m_policy_cd')) {
            return;
        }

        Schema::rename('m_policy', 'm_policy_cd');
    }
}
