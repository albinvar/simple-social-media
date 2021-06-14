<?php

namespace Database\Seeders;

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
        
     $user = \App\Models\User::factory(10)->count(5)
            ->has(
                \App\Models\Post::factory()
                        ->count(10)
                        ->state(function (array $attributes, $user) {
                            return ['user_id' => $user->id];
                        })
            )
            ->create();
    }
}
