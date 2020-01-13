<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('pc_id');
            $table->string('pc_name');
            $table->integer('pc_parent')->nullable ();
            $table->integer('pc_order')->default (0);
            $table->integer('pc_status')->default (0);
            $table->string('pc_description')->default ('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category_conntrollers');
    }
}
