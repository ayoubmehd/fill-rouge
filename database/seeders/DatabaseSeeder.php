<?php

namespace Database\Seeders;

use App\Models\CtmPost;
use App\Models\Platform;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Post::factory(200)->for(
            CtmPost::factory()->has(Platform::factory()->count(2))->for(User::factory()->create())->hasImages(5)->create()
        )->create();
    }
}
