<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSyohinCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_sub_syohin_category', function (Blueprint $table) {
            $table->string('subcategory_cd', 10);
            $table->string('category_cd', 10);
            $table->string('subcategory_mei', 15);
            $table->char('display_order', 2)->nullable();
            $table->text('product_process')->nullable();
            $table->dateTime('upd_date');
            $table->string('patch_id', 128);

            $table->primary('subcategory_cd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sub_syohin_category');
    }
}
