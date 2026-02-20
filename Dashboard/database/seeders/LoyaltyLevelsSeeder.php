<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\LoyaltyLevel;

class LoyaltyLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loyalty_levels')->insert([
            ['name' => 'Bronze', 'min_points' => 0, 'discount_percentage' => 0, 'free_extra_hours' => 0, 'created_at' => now(), 'updated_at' => now()]
        ]);
        $dato = new LoyaltyLevel();
        $dato->name = 'Silver';
        $dato->min_points = 100;
        $dato->discount_percentage = 10;
        $dato->free_extra_hours = 2;
        $dato->save();
    }
}
