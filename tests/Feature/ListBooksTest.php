<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListBooksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_browse_books()
    {
        $books = factory(Book::class, 5)->create();

        $this->get('/')
             ->assertSee($books->first()->title);
    }

    /** @test */
    public function anyone_can_browse_books_by_category()
    {
        $category = factory(Category::class)->create();
        $books = factory(Book::class, 2)->create(['category_id' => $category->id]);
        $noBook = factory(Book::class)->create();

        $this->get(route('by.category', $category->slug))
             ->assertSee($books->first()->title)
             ->assertSee($books->last()->title)
             ->assertDontSee($noBook->title);
    }

    /** @test */
    public function anyone_can_browse_books_by_author()
    {
        $author = factory(Author::class)->create();
        $books = factory(Book::class, 2)->create();
        $books->each(function ($book, $key) use ($author) {
            $book->authors()->attach($author->id);
        });
        $noBook = factory(Book::class)->create();

        $this->get(route('by.author', $author->slug))
             ->assertSee($books->first()->title)
             ->assertSee($books->last()->title)
             ->assertDontSee($noBook->title);
    }
}
