<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ['fk_customer' => 1],
            ['fk_customer' => 2],
            ['fk_customer' => 3],
            ['fk_customer' => 4],
            ['fk_customer' => 5],
            ['fk_customer' => 6],
            ['fk_customer' => 7],
            ['fk_customer' => 8],
            ['fk_customer' => 9],
            ['fk_customer' => 10]
        ];

        Account::factory()
            ->count(count($accounts))
            ->state(new Sequence(...$accounts))
            ->create();
    }
}
