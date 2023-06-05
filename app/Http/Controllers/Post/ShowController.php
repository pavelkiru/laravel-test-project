<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post.show', compact('post'));
    }
}
