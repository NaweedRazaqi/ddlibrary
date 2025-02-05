<?php

namespace Database\Factories;

use App\News;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = News::class;

    /**
      * Define the model's default state.
      *
      * @return array
      */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'summary' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(3),
            'language' => 'en',
            'tnid' => $this->faker->numberBetween(1,200),
            'status' => $this->faker->numberBetween(1,3),
            'user_id' => User::factory()
        ];
    }
}
