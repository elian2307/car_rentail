<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Drivers = Driver::with('user')->get();
        return response()->json([
            'success' => true,
            'data' => $Drivers
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'license_number' => 'required|string|max:255',
            'license_img' => 'required|string|max:255',
        ]);

        $Driver = Driver::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $Driver
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Driver = Driver::with('user')->find($id);

        if (!$Driver) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $Driver
        ]);
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
        $Driver = Driver::find($id);

        if (!$Driver) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found'
            ], 404);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'license_number' => 'required|string|max:255',
            'license_img' => 'required|string|max:255',
        ]);

        $Driver->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $Driver
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Driver = Driver::find($id);

        if (!$Driver) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found'
            ], 404);
        }

        $Driver->delete();

        return response()->json([
            'success' => true,
            'message' => 'Driver deleted successfully'
        ]);
        
    }
}
