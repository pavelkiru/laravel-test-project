<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.



        $data = request()->validate([
            'title' => 'required|string'
        ]);
        $data['slug'] = $data['title'];
        Tag::create($data);


        return redirect()->route('tag.index');
    }
}
