<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, $slug)
    {
        // TODO: Implement __invoke() method.

        $data = $request->validated();

        $post = Post::where('slug', $slug)->firstOrFail();

        $this->service->update($post, $data);

        return redirect()->route('post.show', $post->slug);
    }
}
