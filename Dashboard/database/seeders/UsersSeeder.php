<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John Doe', 'email' => 'john@example.com', 
            'password' => Hash::make('password'), 'created_at' => now(),
             'updated_at' => now(), 'loyalty_points' => 50, 
             'loyalty_level_id' => 1]
        ]);
        $dato = new User();
        $dato->name = 'Jane Smith';
        $dato->email = 'jane@example.com';
        $dato->password = Hash::make('password');
        $dato->loyalty_points = 150;
        $dato->loyalty_level_id = 2;
        $dato->save();
    }
}
