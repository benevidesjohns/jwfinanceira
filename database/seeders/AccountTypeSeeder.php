<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
