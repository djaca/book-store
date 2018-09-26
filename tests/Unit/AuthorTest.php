<?php

namespace Tests\Unit;

use App\Author;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_all_fields()
    {
        $author = factory(Author::class)->create([
            'name' => 'John Doe',
            'slug' => 'john-doe',
        ]);

        $this->assertEquals('John Doe', $author->name);
        $this->assertEquals('john-doe', $author->slug);
    }

    /** @test */
    public function it_belongs_to_many_books()
    {
        $author = factory(Author::class)->create();

        $this->assertInstanceOf(Collection::class, $author->books);
    }
}
