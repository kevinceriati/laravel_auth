<?php

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
        factory(App\User::class, 3)->create()->each(function (\App\User $user) {
            $user->articles()->save(factory(App\Article::class)->make());
        });
    }
}
