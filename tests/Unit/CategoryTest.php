<?php

namespace Tests\Unit;

use App\Category;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_all_fields()
    {
        $book = factory(Category::class)->create([
            'name' => 'Web Development',
            'slug' => 'web-development',
        ]);

        $this->assertEquals('Web Development', $book->name);
        $this->assertEquals('web-development', $book->slug);
    }

    /** @test */
    public function it_has_many_books()
    {
        $category = factory(Category::class)->create();

        $this->assertInstanceOf(Collection::class, $category->books);
    }
}
