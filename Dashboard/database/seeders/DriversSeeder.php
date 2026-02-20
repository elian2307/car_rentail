<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            ['user_id' => 1, 'license_number' => 'D1234567', 'license_img' => 'driver1.jpg', 'created_at' => now(), 'updated_at' => now()]
        ]);
        $dato = new Driver();
        $dato->user_id = 2;
        $dato->license_number = 'D7654321';
        $dato->license_img = 'driver2.jpg';
        $dato->save();
    }
}
