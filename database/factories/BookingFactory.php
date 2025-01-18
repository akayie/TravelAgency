<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_slip'=>$this->faker->imageUrl,
            'status'=>$this->faker->word,
            'note'=>$this->faker->sentence,
            'package_id'=>rand(1,10),
            'payment_id'=>rand(1,10),
            'user_id'=>rand(1,2),
        ];
    }
}
