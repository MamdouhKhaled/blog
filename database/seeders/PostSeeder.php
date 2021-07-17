<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = \App\Models\Tag::factory(3)->create();
        \App\Models\Post::factory(10)->hasAttached($tags)->create();

    }
}
