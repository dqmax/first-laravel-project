<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Category::factory(10)->create();
        $tags = Tag::factory(20)->create();
        $posts = Post::factory(100)->create();

        foreach ($posts as $post) {
            $tagsId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsId);
        }

//        Post::onlyTrashed()->latest('id')->take(5)->get()->each->restore();

//        Post::latest('id')->take(5)->get()->each->delete();
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
