<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLengthColumnSyahanKakeritsuTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_user', function (Blueprint $table) {
            if (Schema::hasColumn('m_user', 'syahan_kakeritsu')) {
                $table->decimal('syahan_kakeritsu', 3, 2)->change();
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
        Schema::table('m_user', function (Blueprint $table) {
            if (Schema::hasColumn('m_user', 'syahan_kakeritsu')) {
                $table->decimal('syahan_kakeritsu', 5, 2)->change();
            }
        });
    }
}
