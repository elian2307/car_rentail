<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            ['rental_id' => 1, 'amount' => 100.00, 
            'payment_method' => 'credit_card', 
            'transaction_id' => 'txn_123456789', 
            'status' => 'completed', 'payment_date' => now(), 
            'created_at' => now(), 'updated_at' => now()]
        ]);
        $dato = new Payment();
        $dato->rental_id = 2;
        $dato->amount = 150.00;
        $dato->payment_method = 'paypal';
        $dato->transaction_id = 'txn_987654321';
        $dato->status = 'pending';
        $dato->save();
    }
}
