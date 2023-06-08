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
        $kampus = [
            "S1 Teknik Elektronika ITS",
            "S1 Teknik Elektronika UBAYA",
            "S1 Teknik Elektronika PENS",
            "S1 Teknik Elektronika UNESA",
            "S1 Teknik INFORMATIKA ITS",
            "S1 Teknik INFORMATIKA UBAYA",
            "S1 Teknik INFORMATIKA PENS",
            "S1 Teknik INFORMATIKA UNESA",
            "S1 Sistem Informasi ITS",
            "S1 Sistem Informasi UBAYA",
            "S1 Sistem Informasi PENS",
            "S1 Sistem Informasi UNESA",
        ];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telp' => fake()->unique()->e164PhoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'bidangKeahlian_id' => rand(1, 7),
            'role' => rand(0, 1),
            'instansi' => $kampus[rand(0, 11)],
            'deskripsi' => fake()->sentence(20),
            'harga' => rand(1,100)*1000,
            'saldo' => rand(1,1000)*1000,
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
