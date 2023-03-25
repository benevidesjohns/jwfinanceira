<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'city' => fake('pt_BR')->city(),
            'state' => fake('pt_BR')->stateAbbr(),
            'cep' => fake('pt_BR')->postcode(),
            'address' => fake('pt_BR')->streetAddress(),
        ];
    }
}
