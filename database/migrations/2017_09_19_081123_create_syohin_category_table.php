<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyohinCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_syohin_category', function (Blueprint $table) {
            $table->string('category_cd', 10);
            $table->string('category_mei', 15);
            $table->char('display_order', 2)->nullable();
            $table->string('category_logo_filen', 200)->nullable();
            $table->text('product_process')->nullable();
            $table->dateTime('upd_date');
            $table->string('patch_id', 128);

            $table->primary('category_cd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_syohin_category');
    }
}
