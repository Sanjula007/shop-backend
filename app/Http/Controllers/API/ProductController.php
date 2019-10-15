<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index ()
	{
		$customers = Product::with ( 'address' )->paginate ( 15 );
		return Response::json ( $customers , 200 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ProductStoreRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store ( ProductStoreRequest $request )
	{
		$filename = 'no-image.jpg';
		if ( $request->hasfile ( 'image' ) ) {
			$file      = $request->file ( 'image' );
			$extension = $file->getClientOriginalExtension (); // getting image extension
			$filename  = time () . '.' . $extension;
			$image_resize = Image::make ( $file->getRealPath () );
			$image_resize->resize ( 700 , null , function ( $constraint ) {
				$constraint->aspectRatio ();
			} );
			$image_resize->save ( public_path ( 'uploads/products/' . $filename ) );
		}

		$product = new Product();

		$product->name        = $request->input ( 'name' );
		$product->description = $request->input ( 'description' );
		$product->price       = $request->input ( 'price' );
		$product->category    = $request->input ( 'category' );
		$product->image       = $filename;

		$product->save ();

		return Response::json ( [ 'success' => true , 'product' => $product ] , 200 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product $product
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show ( Product $product )
	{
		return Response::json ( [ 'success' => true , 'product' => $product ] , 200 );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ProductUpdateRequest $request
	 * @param  \App\Product        $product
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update ( ProductUpdateRequest $request , Product $product )
	{
		$product->name        = $request->input ( 'name' );
		$product->description = $request->input ( 'description' );
		$product->price       = $request->input ( 'price' );
		$product->category    = $request->input ( 'category' );

		if ( $request->hasfile ( 'image' ) ) {
			$file      = $request->file ( 'image' );
			$extension = $file->getClientOriginalExtension (); // getting image extension
			$filename  = time () . '.' . $extension;
			$image_resize = Image::make ( $file->getRealPath () );
			$image_resize->resize ( 700 , null , function ( $constraint ) {
				$constraint->aspectRatio ();
			} );
			$image_resize->save ( public_path ( 'uploads/products/' . $filename ) );
			$product->image       = $filename;
		}

		$product->save ();

		return Response::json ( [ 'success' => true , 'product' => $product ] , 200 );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product $product
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy ( Product $product )
	{
		try {
			$res = $product->delete ();
			if ( $res ) {
				return Response::json ( [ 'success' => true ] , 200 );
			} else {
				return Response::json ( [ 'success' => false ] , 500 );
			}
		} catch ( \Exception $e ) {
			return Response::json ( [ 'success' => false ] , 500 );
		}


	}
}
