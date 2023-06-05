<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.

        $tag = Tag::where('slug', $slug)->firstOrFail();

        return view('tag.edit', compact(['tag', 'slug']));
    }
}
