<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rental;

class RentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rentals')->insert([
            ['user_id' => 1, 'car_id' => 1, 'driver_id' => 1, 'pickup_date' => now(), 'return_date' => now()->addDays(3), 'total_amount' => 150.00, 'status' => 'completed', 'created_at' => now(), 'updated_at' => now()]
        ]);
        $dato = new Rental();
        $dato->user_id = 2;
        $dato->car_id = 2;
        $dato->driver_id = 2;
        $dato->pickup_date = now()->addDays(1);
        $dato->return_date = now()->addDays(4);
        $dato->total_amount = 200.00;
        $dato->status = 'pending';
        $dato->save();
    }
}
