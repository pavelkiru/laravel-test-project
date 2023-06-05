<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.
        $tag = Tag::where('slug', $slug)->firstOrFail();

        return view('tag.show', compact('tag'));
    }
}
