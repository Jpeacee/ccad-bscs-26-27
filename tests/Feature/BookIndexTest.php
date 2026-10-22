<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class BookIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_visit_the_books_index()
    {
        $this->actingAs(User::factory()->create());

        $this->get('/books')->assertInertia(fn (Assert $page) => $page
            ->component('books/index')
        );
    }
}
