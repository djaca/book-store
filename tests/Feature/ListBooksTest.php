<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListBooksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_browse_books()
    {
        $books = factory(Book::class, 5)->create();

        $this->get('/')->assertSee($books->first()->title);
    }
}
