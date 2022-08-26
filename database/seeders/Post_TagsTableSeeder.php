<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Post_tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PostTag::factory(100)->create();
    }
}
