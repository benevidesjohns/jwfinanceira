<?php

namespace Database\Seeders;

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
        $this->call([
            AccountTypeSeeder::class,
            TransactionTypeSeeder::class,
            AddressSeeder::class,
            UserSeeder::class,
            AccountSeeder::class,
            TransactionSeeder::class
        ]);
    }
}
