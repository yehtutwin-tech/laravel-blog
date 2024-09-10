<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PostService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://jsonplaceholder.typicode.com';
    }

    public function getPost($id)
    {
        $response = Http::get("{$this->apiUrl}/posts/{$id}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
