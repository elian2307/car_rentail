<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return response()->json([
            'success' => true,
            'data' => $payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'transaction_id' => 'required|string|unique:payments',
            'status' => 'nullable|in:pending,completed,failed,refunded',
            'payment_date' => 'nullable|date',
        ]);

        $payment = new Payment();
        $payment->rental_id = $validate['rental_id'];
        $payment->amount = $validate['amount'];
        $payment->payment_method = $validate['payment_method'];
        $payment->transaction_id = $validate['transaction_id'];
        if (isset($validate['status'])) {
            $payment->status = $validate['status'];
        } else {
            $payment->status = 'pending';
        }
        if (isset($validate['payment_date'])) {
            $payment->payment_date = $validate['payment_date'];
        }
        $payment->save();

        return response()->json([
            'success' => true,
            'data' => $payment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return response()->json([
                'success' => true,
                'data' => $payment
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'transaction_id' => 'required|string|unique:payments,transaction_id,'.$id,
            'status' => 'required|in:pending,completed,failed,refunded',
            'payment_date' => 'nullable|date',
        ]);

        $payment = Payment::find($id);
        if ($payment) {
            $payment->rental_id = $validate['rental_id'];
            $payment->amount = $validate['amount'];
            $payment->payment_method = $validate['payment_method'];
            $payment->transaction_id = $validate['transaction_id'];
            $payment->status = $validate['status'];
            if (isset($validate['payment_date'])) {
                $payment->payment_date = $validate['payment_date'];
            } else {
                $payment->payment_date = null;
            }
            $payment->save();

            return response()->json([
                'success' => true,
                'data' => $payment
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            return response()->json([
                'success' => true,
                'message' => 'Payment deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }
    }
}
