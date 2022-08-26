<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Tag::factory(100)->create();
    }
}
