<?php

namespace Tests\Integration;

use App\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    public function test_successful_post_api_call()
    {
        Http::fake([
            'jsonplaceholder.typicode.com/posts/*' => Http::response([
                'userId' => 1,
                'id' => 1,
                'title' => 'Sample Post Title',
                'body' => 'Sample Post Body',
            ], 200)
        ]);

        $postService = new PostService();
        $postData = $postService->getPost(1);

        $this->assertNotNull($postData);
        $this->assertEquals(1, $postData['id']);
        $this->assertEquals('Sample Post Title', $postData['title']);
        $this->assertEquals('Sample Post Body', $postData['body']);
    }

    public function test_failed_post_api_call()
    {
        Http::fake([
            'jsonplaceholder.typicode.com/posts/*' => Http::response([], 404)
        ]);

        $postService = new PostService();
        $postData = $postService->getPost(9999);

        $this->assertNull($postData);
    }
}
