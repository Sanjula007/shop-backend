<?php

namespace App\Observers;

use App\Product;
use App\Stock;

class ProductObserver
{
	/**
	 * Handle the post "saving" event.
	 *
	 * @param Product $product
	 * @return void
	 */
	public function saving ( Product $product )
	{

	}

	/**
	 * Handle the post "saving" event.
	 *
	 * @param Product $product
	 * @return void
	 */
	public function saved ( Product $product )
	{

	}


	/**
	 * Handle the product "created" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function created ( Product $product )
	{
		$stock = new Stock( [ 'product_id' => $product->id , 'quantity' => 0 ] );
		$stock->save ();
	}

	/**
	 * Handle the product "creating" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function creating ( Product $product )
	{

	}

	/**
	 * Handle the product "updated" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function updated ( Product $product )
	{

	}

	/**
	 * Handle the product "updated" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function updating ( Product $product )
	{

	}

	/**
	 * Handle the product "deleted" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function deleted ( Product $product )
	{
		//
	}

	/**
	 * Handle the product "restored" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function restored ( Product $product )
	{
		//
	}

	/**
	 * Handle the product "force deleted" event.
	 *
	 * @param  \App\Product $product
	 * @return void
	 */
	public function forceDeleted ( Product $product )
	{
		//
	}
}
