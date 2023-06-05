<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        // TODO: Implement __invoke() method.

        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }
}
