<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_all_fields()
    {
        $book = factory(Book::class)->create([
            'title' => 'PHP',
            'description' => 'Book about PHP',
            'isbn' => '123',
            'price' => '4.45',
            'in_stock' => '20',
            'img' => 'book-img.jpg'
        ]);

        $this->assertEquals('PHP', $book->title);
        $this->assertEquals('Book about PHP', $book->description);
        $this->assertEquals('123', $book->isbn);
        $this->assertEquals('4.45', $book->price);
        $this->assertEquals('20', $book->in_stock);
        $this->assertEquals('book-img.jpg', $book->img);
    }
}