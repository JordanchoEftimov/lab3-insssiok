<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            $blogPost = new BlogPost([
                'title' => 'Blog post title No.'.$i,
                'description' => 'Blog post description No.'.$i,
            ]);
            $blogPost->user()->associate(User::query()->first());
            $blogPost->save();
        }
    }
}
