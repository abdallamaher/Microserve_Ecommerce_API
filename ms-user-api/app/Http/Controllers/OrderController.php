<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at','desc')->paginate(10);
        return new OrderResource($orders->load('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return ProductResource
     */
    public function store(StoreOrderRequest $request)
    {
        $order = $request->all();

        //$order['buyer_id'] = Auth::id();
        $order['buyer_id'] = 1;
        //$order['total_price'] = sum($order->products);

        $order = Order::create($order);

        $products = $request->input('products');

        foreach ($products as &$product)
        {
            $product['order_id'] = $order->id;
        }

        $order->products()->createMany($products);

        return new ProductResource($order->load('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ProductResource
     */
    public function show($id)
    {
        $order = Order::find($id);
        if($order === null)
        {
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }
        return new ProductResource($order->load('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buyer_id = Auth::id();
        $order = Order::where('buyer_id', $buyer_id)->where('id', $id)->first();
        if($order === null)
        {
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => trans('data.order_del'),
        ], 200);
    }
}
