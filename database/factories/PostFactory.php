<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $txt = $this->faker->realText(rand(1000, 4000));
        $is_published = rand(1, 5) > 1;
        $created_at = $this->faker->dateTimeBetween('-3 months', '-2 months');
        return [
            'title' => $this->faker->sentence(rand(3, 8), true),
            'content' => $txt,
            'content_html' => $txt,
            'preview' => $this->faker->text(rand(40, 100)),
            'user_id' => (rand(1, 5) == 5) ? 1 : 2,
            'category_id' => (rand(1, 5) == 5) ? 1 : 2,
            'is_published' => $is_published,
            'published_at' => $is_published ? $this->faker->dateTimeBetween('-2 months', '-1 days') : null,
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }

}
