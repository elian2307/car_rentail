<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('brand')->get();
        return response()->json([
            'success' => true,
            'data' => $cars
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
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:cars,license_plate',
            'mileage' => 'required|integer|min:0',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'is_premium' => 'required|boolean',
            'rental_count' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
        ]);
        $car = new Car();
        $car->brand_id = $validate['brand_id'];
        $car->model = $validate['model'];
        $car->year = $validate['year'];
        $car->color = $validate['color'];
        $car->license_plate = $validate['license_plate'];
        $car->mileage = $validate['mileage'];
        $car->lat = $validate['lat'];
        $car->lng = $validate['lng'];
        $car->is_premium = $validate['is_premium'];
        $car->rental_count = $validate['rental_count'];
        $car->status = $validate['status'];
        $car->save();
        return response()->json([
            'success' => true,
            'data' => $car
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('brand')->find($id);
        if ($car) {
            return response()->json([
                'success' => true,
                'data' => $car
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Car not found'
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
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:cars,license_plate,' . $id,
            'mileage' => 'required|integer|min:0',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'is_premium' => 'required|boolean',
            'rental_count' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
        ]);
        $car = Car::find($id);
        if ($car) {
            $car->brand_id = $validate['brand_id'];
            $car->model = $validate['model'];
            $car->year = $validate['year'];
            $car->color = $validate['color'];
            $car->license_plate = $validate['license_plate'];
            $car->mileage = $validate['mileage'];
            $car->lat = $validate['lat'];
            $car->lng = $validate['lng'];
            $car->is_premium = $validate['is_premium'];
            $car->rental_count = $validate['rental_count'];
            $car->status = $validate['status'];
            $car->save();
            return response()->json([
                'success' => true,
                'data' => $car
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Car not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        if ($car) {
            $car->delete();
            return response()->json([
                'success' => true,
                'message' => 'Car deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Car not found'
            ], 404);
        }
    }
}
