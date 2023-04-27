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
            ['fk_user' => 1],
            ['fk_user' => 2],
            ['fk_user' => 3],
            ['fk_user' => 4],
            ['fk_user' => 5],
            ['fk_user' => 6],
            ['fk_user' => 7],
            ['fk_user' => 8],
            ['fk_user' => 9],
            ['fk_user' => 10]
        ];

        Account::factory()
            ->count(count($accounts))
            ->state(new Sequence(...$accounts))
            ->create();
    }
}
