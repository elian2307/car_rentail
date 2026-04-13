<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json([
            'success' => true,
            'data' => $brands
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
            'name' => 'required|string|max:255',
            'img' => 'required|string|max:255',
        ]);
        $brand = new Brand();
        $brand->name = $validate['name'];
        $brand->img = $validate['img'];
        $brand->save();
        return response()->json([
            'success' => true,
            'data' => $brand
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            return response()->json([
                'success' => true,
                'data' => $brand
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found'
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
            'name' => 'required|string|max:255',
            'img' => 'required|string|max:255',
        ]);
        $brand = Brand::find($id);
        if ($brand) {
            $brand->name = $validate['name'];
            $brand->img = $validate['img'];
            $brand->save();
            return response()->json([
                'success' => true,
                'data' => $brand
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return response()->json([
                'success' => true,
                'message' => 'Brand deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found'
            ], 404);
        }
    }
}
