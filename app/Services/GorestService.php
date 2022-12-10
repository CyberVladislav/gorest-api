<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GorestService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://gorest.co.in/public/v2';
    }

    public function getUsers()
    {
        return Http::get($this->baseUrl.'/users')->json();
    }

    public function deleteUser(int $id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('services.gorest.api_key')
        ])->delete($this->baseUrl.'/users/'.$id);

        return $response->successful();
    }

    public function getPosts()
    {
        return Http::get($this->baseUrl.'/posts')->json();
    }

    public function getPostComments(int $postId)
    {
        return Http::get($this->baseUrl.'/posts/'.$postId.'/comments')->json();
    }
}
