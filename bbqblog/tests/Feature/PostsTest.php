<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /** @test */
    public function user_can_create_post()
    {
        //$this->withoutExceptionHandling();

        // Given; User is logged in
        $this->actingAs(factory('App\User')->create());

        // When; User hit the endpoint /posts/create to create a new post with data
        $title = $this->faker->sentence();
        $this->post('/posts', [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->text()
        ]);

        // Then; A new post will be in the database
        $this->assertDatabaseHas('posts', [
            'title' => $title
        ]);
    }

    /** @test */
    public function guest_cannot_create_post()
    {
        //$this->withoutExceptionHandling();

        $this->post('/posts')->assertRedirect('/login');
    }
}
