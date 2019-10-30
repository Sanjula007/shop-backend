<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		Schema::create ( 'Stocks' , function ( Blueprint $table ) {
			$table->bigIncrements ( 'stock_id' );
			$table->integer ( 'product_id' );
			$table->integer ( 'quantity' );

			$table->timestamps ();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists ( 'Stocks' );
	}
}
