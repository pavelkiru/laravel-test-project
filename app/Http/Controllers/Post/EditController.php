<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = Tag::all();
        return view('post.edit', compact(['post', 'slug', 'tags']));
    }
}
