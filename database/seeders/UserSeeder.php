<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador
        User::create([
            'name' => 'Administrador',
            'phone_number' => fake('pt_BR')->cellphoneNumber(),
            'cpf' => '00000000000',
            'fk_address' => random_int(1, 10),
            'email' => 'administrador@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
        ]);

        $adminUser = User::find(1);
        $adminUser->assignRole('administrador');

        // Outros usuários
        User::factory()->afterCreating(function ($user) {
            $user->assignRole('cliente');
        })->count(10)->create();
    }
}
