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
class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => implode(' ', fake()->words(1))
        ];
    }
}
