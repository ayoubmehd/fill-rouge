<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CtmPost;
use App\Models\User;

class CtmPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CtmPost::factory(20)->for(User::factory()->create())->hasImages(5)->create();
    }
}
