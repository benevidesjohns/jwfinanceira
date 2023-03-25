<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction_types = [
            ['type' => 'PIX'],
            ['type' => 'Espécie'],
            ['type' => 'Cartão de Crédito'],
            ['type' => 'Cartão de Débito'],
            ['type' => 'Transferência Bancária'],
            ['type' => 'DOC'],
            ['type' => 'TED'],
            ['type' => 'Boleto'],
        ];

        TransactionType::factory()
            ->count(count($transaction_types))
            ->state(new Sequence(...$transaction_types))
            ->create();
    }
}
