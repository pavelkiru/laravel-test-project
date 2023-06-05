<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class DestroyController extends BaseController
{
    public function __invoke($slug)
    {
        // TODO: Implement __invoke() method.
        $post = Post::where('slug', $slug)->firstOrFail();

        $this->service->deleteImage($post);

        $post->delete();

        return redirect()->route('post.index');
    }
}
