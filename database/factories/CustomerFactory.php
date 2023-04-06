<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake('pt_BR')->name(),
            'phone_number' => fake('pt_BR')->cellphoneNumber(),
            'cpf' => fake()->numerify('###########'),
            'fk_address' => random_int(1, 10)
        ];
    }
}
