<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class bookReservationTest extends TestCase
{
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
}
