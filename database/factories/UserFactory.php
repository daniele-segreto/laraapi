<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // crea un nome a random
            'email' => fake()->unique()->safeEmail(), // crea un email a random
            'email_verified_at' => now(), // crea la data corrente
            'password' => \Hash::make('dededede'), // cambio password ('dededede' è la nuova password da inserire)
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password random
            'remember_token' => Str::random(10), // (*) crea una stringa randomica di 10
            'age' => fake()->numberBetween(18,99), // crea un età a random compresa tra 18 e 99 anni
            'province' => fake()->state(), // crea uno stato a random
            'phone' => fake()->phoneNumber(32), // crea un numero di telefono a random (massimo 32 numeri)
            'lastname' => fake()->lastName(), // crea un cognome in automatico
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
