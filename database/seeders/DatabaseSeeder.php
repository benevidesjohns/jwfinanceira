<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccountType;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # Tipos de Conta
        $account_types = [
            ['type' => 'Corrente'],
            ['type' => 'Poupança'],
            ['type' => 'Salário'],
            ['type' => 'Universitária'],
            ['type' => 'Internet Banking'],
            ['type' => 'Digital'],
        ];

        AccountType::factory()
            ->count(count($account_types))
            ->state(new Sequence(...$account_types))
            ->create();

        # Tipos de Transacao
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
