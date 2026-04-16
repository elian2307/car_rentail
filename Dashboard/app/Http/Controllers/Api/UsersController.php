<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'data' => $users
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'loyalty_points' => 'nullable|integer',
            'loyalty_level_id' => 'nullable|exists:loyalty_levels,id',
        ]);

        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = Hash::make($validate['password']);
        if (isset($validate['loyalty_points'])) {
            $user->loyalty_points = $validate['loyalty_points'];
        }
        if (isset($validate['loyalty_level_id'])) {
            $user->loyalty_level_id = $validate['loyalty_level_id'];
        }
        $user->save();

        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
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
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
            'loyalty_points' => 'nullable|integer',
            'loyalty_level_id' => 'nullable|exists:loyalty_levels,id',
        ]);

        $user = User::find($id);
        if ($user) {
            $user->name = $validate['name'];
            $user->email = $validate['email'];
            if (!empty($validate['password'])) {
                $user->password = Hash::make($validate['password']);
            }
            if (isset($validate['loyalty_points'])) {
                $user->loyalty_points = $validate['loyalty_points'];
            } else {
                $user->loyalty_points = $validate['loyalty_points'] ?? $user->loyalty_points;
            }
            if (isset($validate['loyalty_level_id'])) {
                $user->loyalty_level_id = $validate['loyalty_level_id'];
            } else {
                $user->loyalty_level_id = $validate['loyalty_level_id'] ?? $user->loyalty_level_id;
            }
            $user->save();

            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }
}
