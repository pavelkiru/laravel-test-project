<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $tags = Tag::all();



        return view('post.create', compact('tags'));
    }
}
