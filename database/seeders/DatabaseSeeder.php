<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Twit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(30)->create();
        Twit::factory(100)->create();
        Tag::factory(70)->create();

        foreach (Twit::all() as $twit) {
            $twit->tags()->attach(
                Tag::inRandomOrder()->take(rand(1,3))->pluck('id')
            );
        }

    }
}
