<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.

        return view('tag.create');
    }
}
