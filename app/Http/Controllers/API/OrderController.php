<?php

namespace App\Http\Controllers\API;
;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Order;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( OrderStoreRequest $request )
    {
        $order = new Order($request->only([ 'o_customer', 'o_description' ]));
        $order->save();


        return Response::json([ 'success' => true, 'order' => $order ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show( Order $order )
    {
        $order->items;

        return Response::json ( [ 'success' => true , 'order' => $order ] , 200 );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\API\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update( OrderUpdateRequest $request, Order $order )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\API\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy( Order $order )
    {
        //
    }
}
