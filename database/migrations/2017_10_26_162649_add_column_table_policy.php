<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTablePolicy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('m_policy')) {
            return;
        }
        Schema::table('m_policy', function (Blueprint $table) {
            if (!Schema::hasColumn('m_policy', 'regis_license')) {
                $table->string('regis_license')->nullable()->after('builder_intro');
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
        if (!Schema::hasTable('m_policy')) {
            return;
        }
        Schema::table('m_policy', function (Blueprint $table) {
            if (Schema::hasColumn('m_policy', 'regis_license')) {
                $table->dropColumn('regis_license');
            }
        });
    }
}
