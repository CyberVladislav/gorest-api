<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GorestService;

class PostController extends Controller
{
    protected GorestService $gorestService;

    public function __construct(GorestService $gorestService)
    {
        $this->gorestService = $gorestService;
    }

    public function index()
    {
        $posts = $this->gorestService->getPosts();

        foreach ($posts as &$post) {
            $post['comments'] = $this->gorestService->getPostComments($post['id']);
        };

        return view('posts', [
            'posts' => $posts,
        ]);
    }
}
