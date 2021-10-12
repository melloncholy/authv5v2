<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_at = $this->faker->dateTimeBetween('-3 months', '-2 months');
        return [
            'text' => $this->faker->text(rand(40, 100)),
            'user_id' => (rand(1, 5) == 5) ? 1 : 2,
            'post_id' => (rand(1, 5) == 5) ? 1 : 5,
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }

}
