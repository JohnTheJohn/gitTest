<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FirstTest extends TestCase
{
    /**
     * A basic test example.
     * @group basic-tests
     * @return void
     */
    public function testExample()
    {
        //creating post
        $post = Post::create([
            'title' => 'Test post',
            'content' => 'Test post content'
        ]);

        //action
        $resp = $this->get("/about/{$post->id}");
        //assert
        $resp->assertSee($post->title);
        $resp->assertSee($post->content);
        $resp->assertSee($post->created_at->toFormattedDateString());
        $resp->assertStatus(200);
    }

    /**
     * @group post-not-found
     *
     */
    public function testShow404WhenPostIsNotFound()
    {
        //action
        $resp = $this->get('/about/Invalid_id');

        //assert
        $resp->assertStatus(404);
        $resp->assertSee('The post you are looking for does not exist');

    }
}
