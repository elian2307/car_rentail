<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Toyota', 'img' => 'toyota.png', 'created_at' => now(), 'updated_at' => now()]
        ]);
        $dato = new Brand();
        $dato->name = 'Honda';
        $dato->img = 'honda.png';
        $dato->save();
    }
}
