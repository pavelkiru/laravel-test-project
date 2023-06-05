<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.
        //$tags = Tag::all();

        $data = request()->validate([
            'title' => 'required|string'
        ]);
        $data['slug'] = $data['title'];

        $tag = Tag::where('slug', $slug)->firstOrFail();

        $tag->update($data);

        return redirect()->route('tag.show', $tag->slug);
    }
}
