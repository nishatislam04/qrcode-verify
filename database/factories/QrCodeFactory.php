<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QrCode>
 */
class QrCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::uuid(), // unique per code
            'user_id' => null, // not owned initially
            'fingerprint' => null,
            'name' => null,
            'email' => null,
            'phone' => null,
            'registered_at' => null,
            'scanned_at' => null,
            'scanned_ip' => null,
        ];
    }
}
