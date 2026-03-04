<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
            'wallet'            => fake()->numberBetween(100, 2000),
            'bank'              => fake()->numberBetween(100, 2000),
            'created_at'        => fake()->dateTimeBetween('-25 years')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model's is_admin to be true.
     */
    public function isAdmin()
    {
        return $this->state(fn($attributes) => [
            'is_admin' => 1,
        ])
            ->afterMaking(function (User $user) {
                Log::info('After making function');
            })
            ->afterCreating(fn(User $user) => Log::info('After creatin function'));
    }


    /**
     * Configure the model factory automatic.
     */

    // public function configure()
    // {
    //     return $this->afterMaking(function (User $user) {
    //         Log::info('After making function');
    //     })
    //         ->afterCreating(fn(User $user) => Log::info('After creatin function'));
    // }
}
