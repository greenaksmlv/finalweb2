<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user:id,name', 'order')->get();
        return response()->json(['message' => 'Successfully fetched transactions', 'data' => $transactions], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id', 
            'transaction_amount' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:Cash, DANA, Transfer',
        ]);

        $transaction = Transaction::create($request->all());
        return response()->json(['message' => 'Transaction successfully created', 'data' => $transaction], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load(['user', 'order']);
        return response()->json(['message' => 'Successfully fetched transaction', 'data' => $transaction], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id', 
            'transaction_amount' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:Cash, DANA, Transfer',
        ]);

        $transaction->update($request->all());
        return response()->json(['message' => 'Transaction successfully updated', 'data' => $transaction], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(['message' => 'Transaction successfully deleted'], 200);
    }
}
