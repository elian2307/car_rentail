<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::all();
        return response()->json([
            'success' => true,
            'data' => $rentals
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
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after:pickup_date',
            'total_amount' => 'required|numeric',
            'status' => 'nullable|in:pending,confirmed,completed,cancelled',
        ]);

        $rental = new Rental();
        $rental->user_id = $validate['user_id'];
        $rental->car_id = $validate['car_id'];
        if (isset($validate['driver_id'])) {
            $rental->driver_id = $validate['driver_id'];
        }
        $rental->pickup_date = $validate['pickup_date'];
        $rental->return_date = $validate['return_date'];
        $rental->total_amount = $validate['total_amount'];
        if (isset($validate['status'])) {
            $rental->status = $validate['status'];
        } else {
            $rental->status = 'pending';
        }
        $rental->save();

        return response()->json([
            'success' => true,
            'data' => $rental
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rental = Rental::find($id);
        if ($rental) {
            return response()->json([
                'success' => true,
                'data' => $rental
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rental not found'
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
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after:pickup_date',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $rental = Rental::find($id);
        if ($rental) {
            $rental->user_id = $validate['user_id'];
            $rental->car_id = $validate['car_id'];
            if (isset($validate['driver_id'])) {
                $rental->driver_id = $validate['driver_id'];
            } else {
                $rental->driver_id = null;
            }
            $rental->pickup_date = $validate['pickup_date'];
            $rental->return_date = $validate['return_date'];
            $rental->total_amount = $validate['total_amount'];
            $rental->status = $validate['status'];
            $rental->save();

            return response()->json([
                'success' => true,
                'data' => $rental
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rental not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rental = Rental::find($id);
        if ($rental) {
            $rental->delete();
            return response()->json([
                'success' => true,
                'message' => 'Rental deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rental not found'
            ], 404);
        }
    }
}
