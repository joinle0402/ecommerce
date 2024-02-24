<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $province = Province::query()->inRandomOrder()->first();
        $district = District::query()->where('province_code', $province?->code)->inRandomOrder()->first();
        $ward = Ward::query()->where('district_code', $district?->code)->inRandomOrder()->first();
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => fake()->numerify('0#########'),
            'birthday' => fake()->dateTimeBetween('-40 years', '-10 years')->format('Y-m-d'),
            'role_id' => fake()->randomElement([1, 2]),
            'province_code' => $province?->code,
            'district_code' => $district?->code,
            'ward_code' => $ward?->code,
            'address' => implode(", ", [$ward?->full_name, $district?->full_name, $province?->full_name]),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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
