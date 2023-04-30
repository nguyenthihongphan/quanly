<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = \App\Models\User::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($user_id),
            'note' => $this->faker->text(100),
        ];
    }
}

