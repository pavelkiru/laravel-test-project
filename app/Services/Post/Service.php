<?php


namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class Service
{
    public function store($data) {

        if(isset($data['tags'])) {
            $tags = $data['tags'];
        }

        unset($data['tags']);

        $data['slug'] = $data['name'];

        if (isset($data['image'])) {
            $data['image'] = self::imageProcessing($data);
        }

        $post = Post::create($data);

        if($tags){
            $post->tags()->attach($tags);
        }

    }

    public function update($post, $data) {

        if(isset($data['tags'])) {
            $tags = $data['tags'];
        }
        unset($data['tags']);

        $data['slug'] = $data['name'];

        if (isset($data['image'])) {
            $data['image'] = self::imageProcessing($data);
        }

        $post->update($data);

        if($tags){
            $post->tags()->sync($tags);
        }

    }

    public function deleteImage($post) {

        $thumbnail_path = public_path() . '/images/thumbnail/' . $post->image;
        $origin_path = public_path() . '/images/origin/' . $post->image;

        File::delete($thumbnail_path);
        File::delete($origin_path);
    }

    private static function imageProcessing($data) {

        $filename = $data['image']->getClientOriginalName();
        $data['image']->move(public_path().'/images/origin/',$filename);
        $thumbnail = Image::make(public_path().'/images/origin/'.$filename);
        $thumbnail->fit(300, 300);
        $thumbnail->save( public_path() . '/images/thumbnail/'.$filename);

        return $filename;
    }


}
