<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('o_id');
            $table->integer ('o_customer');
            $table->float  ('o_discount',12,2)->default (0);
            $table->float  ('o_total',12,2);
            $table->string ('o_description',1024)->nullable ();
            $table->timestamps();
            $table->softDeletes ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
