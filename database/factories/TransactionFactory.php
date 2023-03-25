<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => now(),
            'amount' => random_int(-10000, 10000),
            'fk_account' => random_int(1, 10),
            'fk_transaction_type' => random_int(1, 8)
        ];
    }
}
