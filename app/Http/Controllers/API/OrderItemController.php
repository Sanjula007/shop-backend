<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\OrderItem\OrderItemStoreRequest;
use App\Http\Requests\OrderItem\OrderItemUpdateRequest;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class OrderItemController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Order $order, OrderItemStoreRequest $request)
    {

        $order_item = new OrderItem(array_merge( $request->only([ 'oi_product', 'oi_quantity' ]),['oi_order_id'=>$order->o_id]));
        $order_item->save();

        $order->items;
        return Response::json([ 'success' => true, 'order' => $order ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(OrderItemUpdateRequest $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        //
    }
}
