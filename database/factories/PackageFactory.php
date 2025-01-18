<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word,
            'price'=>$this->faker->numberBetween(10000,90000),
            'image'=>$this->faker->imageUrl,
            'itinerary'=>$this->faker->paragraph,
            'duration'=>$this->faker->numberBetween(1,31),
            'inclusion'=>$this->faker->text,
            'exclusion'=>$this->faker->text,
            'destination_id'=>rand(1,10),
           
        ];
    }
}
