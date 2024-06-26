<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(),
            'description' => $this->faker->paragraph(),
            'init_date' => $this->faker->dateTimeThisDecade,
            'end_date' => $this->faker->dateTimeThisDecade,
            'max_participants' => $this->faker->randomNumber(2),
            'entry_price' => $this->faker->randomNumber(2),
            'event_image' => $this->faker->imageUrl(400, 400)
        ];
    }
}
