<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItems extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		Schema::create ( 'order_item' , function ( Blueprint $table ) {
			$table->bigIncrements ( 'oi_id' );
			$table->integer ( 'oi_product' );
			$table->float ( 'oi_product_unit_price' , 12 , 2 );
			$table->float ( 'oi_product_total_discount' , 12 , 2 )->default ( 0 );
			$table->integer ( 'oi_quantity' );
			$table->timestamps ();
			$table->softDeletes ();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists ( 'order_item' , function ( Blueprint $table ) {
			//
		} );
	}
}
