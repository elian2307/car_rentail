<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LoyaltyLevel;
use Illuminate\Http\Request;

class LoyaltyLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loyaltyLevels = LoyaltyLevel::all();
        return response()->json([
            'success' => true,
            'data' => $loyaltyLevels
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
            'name' => 'required|string|max:255|unique:loyalty_levels',
            'min_points' => 'required|integer',
            'discount_percentage' => 'required|integer',
            'free_extra_hours' => 'required|integer',
        ]);

        $loyaltyLevel = new LoyaltyLevel();
        $loyaltyLevel->name = $validate['name'];
        $loyaltyLevel->min_points = $validate['min_points'];
        $loyaltyLevel->discount_percentage = $validate['discount_percentage'];
        $loyaltyLevel->free_extra_hours = $validate['free_extra_hours'];
        $loyaltyLevel->save();

        return response()->json([
            'success' => true,
            'data' => $loyaltyLevel
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loyaltyLevel = LoyaltyLevel::find($id);
        if ($loyaltyLevel) {
            return response()->json([
                'success' => true,
                'data' => $loyaltyLevel
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Loyalty level not found'
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
            'name' => 'required|string|max:255|unique:loyalty_levels,name,'.$id,
            'min_points' => 'required|integer',
            'discount_percentage' => 'required|integer',
            'free_extra_hours' => 'required|integer',
        ]);

        $loyaltyLevel = LoyaltyLevel::find($id);
        if ($loyaltyLevel) {
            $loyaltyLevel->name = $validate['name'];
            $loyaltyLevel->min_points = $validate['min_points'];
            $loyaltyLevel->discount_percentage = $validate['discount_percentage'];
            $loyaltyLevel->free_extra_hours = $validate['free_extra_hours'];
            $loyaltyLevel->save();

            return response()->json([
                'success' => true,
                'data' => $loyaltyLevel
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Loyalty level not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loyaltyLevel = LoyaltyLevel::find($id);
        if ($loyaltyLevel) {
            $loyaltyLevel->delete();
            return response()->json([
                'success' => true,
                'message' => 'Loyalty level deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Loyalty level not found'
            ], 404);
        }
    }
}
