<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function ( Request $request ) {
    return $request->user();
});

Route::apiResources([
                        'customers'            => 'API\CustomerController',
                        'addresses'            => 'API\AddressController',
                        'products/categories'  => 'API\ProductCategoryController',
                        'products'             => 'API\ProductController',
                        'orders/{order}/items' => 'API\OrderItemController',
                        'orders'               => 'API\OrderController',
                    ]);

//Route::get('products/categories', 'API\ProductCategoryController@index');
//Route::post('products/categories', 'API\ProductCategoryController@store');
//Route::put('products/categories/{category}', 'API\ProductCategoryController@update');
//Route::delete('products/categories/{category}', 'API\ProductCategoryController@destory');
