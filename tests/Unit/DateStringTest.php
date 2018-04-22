<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DateStringTest extends TestCase
{
    /**
     * @group date-tests
     */
    public function testIfDateStringFormattedCorrectly()
    {

        $post = Post::create([
            'title' => 'Test post',
            'content' => 'Test post content'
        ]);

        $formattedDate = $post->createdAt();
        $this->assertEquals($formattedDate, $post->created_at->toFormattedDateString());
    }
}
