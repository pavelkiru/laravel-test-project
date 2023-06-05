<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.
        $tag = Tag::where('slug', $slug)->firstOrFail();

        foreach ($tag->posts as $item) {
            $item->delete();
        }

        $tag->delete();

        return redirect()->route('tag.index');
    }
}
