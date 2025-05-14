<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return response()->json(['message' => 'Successfully fetched coupons', 'data' => $coupons], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupon = Coupon::create($request->all());
        return response()->json(['message' => 'Coupon successfully created', 'data' => $coupon], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return response()->json(['message' => 'Successfully fetched coupon', 'data' => $coupon], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update($request->all());
        return response()->json(['message' => 'Coupon successfully updated', 'data' => $coupon], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response()->json(['message' => 'Coupon successfully deleted'], 200);
    }
}
