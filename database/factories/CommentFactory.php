<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email'=>$this->faker->email(),
            'content'=>$this->faker->sentence(10),
            'date'=>$this->faker->date(),
            'article_id'=>rand(1,5),

        ];
    }
}
