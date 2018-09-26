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
        factory(\App\User::class)->create(['email' => 'johnDoe@gmail.com']);
        factory(\App\Book::class, 15)->create();
        $authors = factory(\App\Author::class, 20)->create();

        \App\Book::all()->each(function ($item, $key) use ($authors) {
            $item->authors()->attach($authors->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
