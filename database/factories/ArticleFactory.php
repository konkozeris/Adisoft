<?php

namespace Database\Factories;

use Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->catchPhrase(),
            'content'=>$this->faker->sentence(20),
            'description'=>$this->faker->sentence(3),
            'date'=>$this->faker->date(),
        ];
    }
}
