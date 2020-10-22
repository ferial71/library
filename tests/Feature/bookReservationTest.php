<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class bookReservationTest extends TestCase
{
    use RefreshDatabase;
  /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
            'title' => 'Book title',
            'author' => 'ferial',
        ]);
        $response->assertOk();
        $this->assertCount(1,Book::all());
    }
    /** @test */
    public function a_title_is_required()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'ferial',
        ]);

        $response->assertSessionHasErrors('title');


    }
    /** @test */
    public function an_author_is_required()
    {
//        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
            'title' => 'title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');


    }
    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post('/books', [
            'title' => 'title',
            'author' => 'ferial',
        ]);

        $book = Book::first();

        $response =$this->patch('/books/' . $book->id,[
            'title' =>'new title',
            'author' =>'new author',
        ]);
        $this->assertEquals('new title', Book::first()->title);
        $this->assertEquals('new author', Book::first()->author);


    }
}
