<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCategoryStoreRequest;
use App\Http\Requests\Product\ProductCategoryUpdateRequest;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(ProductCategory::paginate(15), 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductCategoryStoreRequest $request )
    {
        $product_category = new ProductCategory($request->only([ 'pc_name', 'pc_description', 'pc_order', 'pc_parent', 'pc_status' ]));
        $product_category->save();
        $product_category->parent;

        return Response::json([ 'success' => true, 'product_category' => $product_category ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $product_category =ProductCategory::with(['parent','children'])->find($id);

        return Response::json([ 'success' => true, 'product_category' => $product_category ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( ProductCategoryUpdateRequest $request, ProductCategory $category )
    {
        $category->update ( $request->only ( [ 'pc_name', 'pc_description', 'pc_order', 'pc_parent', 'pc_status' ]) );
        $category->save ();

        $category->parent;
        $category->children;
        return Response::json ( [ 'success' => true , 'product_category' => $category ] , 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductCategory $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy( ProductCategory $category )
    {
        $res = $category->delete ();

        if ( $res ) {
            return Response::json ( [ 'success' => true ] , 200 );
        } else {
            return Response::json ( [ 'success' => false ] , 500 );
        }
    }
}
