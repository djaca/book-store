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
        factory(\App\Book::class, 30)->create();
    }
}
