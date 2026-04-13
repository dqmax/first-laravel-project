<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => implode(' ', fake()->words(1)),
            'content' => fake()->realText(30),
            'category_id' => Category::get()->random()->id,
            'image' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
            'is_published' => 1,
            'likes' => rand(1, 2000),
        ];
    }
}
