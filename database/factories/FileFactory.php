<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid'=>$this->faker->unique()->uuid,
            'name'=>$this->faker->word.'.mp4',
            'path'=>'\camino1\loco.mp4',
            'size'=>rand(1000,50000),
            'user_id'=>rand(1,4),
        ];
    }
}
