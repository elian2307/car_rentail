<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            ['brand_id' => 1, 'model' => 'Corolla', 'year' => 2020, 'color' => 'Red', 'license_plate' => 'ABC123',
             'mileage' => 15000, 'lat' => 40.7128, 'lng' => -74.0060, 'is_premium' => false, 'rental_count' => 5, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()]
        ]);
        $dato = new Car();
        $dato->brand_id = 2;
        $dato->model = 'Civic';
        $dato->year = 2019;
        $dato->color = 'Blue';
        $dato->license_plate = 'XYZ789';
        $dato->mileage = 20000;
        $dato->lat = 34.0522;
        $dato->lng = -118.2437;
        $dato->is_premium = false;
        $dato->rental_count = 3;
        $dato->status = 'available';
        $dato->save();
    }
}
