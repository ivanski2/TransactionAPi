<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::create([
            'amount' => 100,
            'type' => 'deposit',
            'description' => 'Initial deposit'
        ]);

        Transaction::create([
            'amount' => 50,
            'type' => 'withdrawal',
            'description' => 'ATM withdrawal'
        ]);
    }
}
