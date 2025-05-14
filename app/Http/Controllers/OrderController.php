<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user:id,name', 'coupon')->get();
        return response()->json(['message' => 'Successfully fetched orders', 'data' => $orders], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'coupon_id' => 'required|exists:coupons,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'redeemed' => 'required|in:pending,processing,completed,canceled',
        ]);

        $order = Order::create($request->all());
        return response()->json(['message' => 'Order successfully created', 'data' => $order], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'coupon']);
        return response()->json(['message' => 'Successfully fetched order', 'data' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'coupon_id' => 'sometimes|exists:coupons,id',
            'quantity' => 'sometimes|integer|min:1',
            'total_price' => 'sometimes|numeric|min:0',
            'redeemed' => 'sometimes|in:pending,processing,completed,canceled',
        ]);

        $order->update($request->all());
        return response()->json(['message' => 'Order successfully updated', 'data' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Order successfully deleted'], 200);
    }
}
