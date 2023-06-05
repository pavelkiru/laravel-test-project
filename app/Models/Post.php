<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'posts';

    //protected $guarded = false;
    protected $fillable = ['name', 'slug', 'content', 'image'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->slug = $post->createSlug($post->name);
            $post->save();
        });
    }

    /**
     * create slug
     *
     * @return response()
     */
    private function createSlug($name)
    {


        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if ($max == null) {
                return $slug;
            }

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }




//    second variant
//    public function tags() {
//        return $this->belongsToMany(Tag::class);
//    }


//
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::created(function ($post) {
//            $post->slug = $post->createSlug($post->name);
//            $post->save();
//        });
//    }
//
//
//    /**
//     * Write code on Method
//     *
//     * @return response()
//     */
//    private function createSlug($name){
//        if (static::whereSlug($slug = Str::slug($name))->exists()) {
//            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
//
//          //  dd(gettype($max));
//
//
//            if (is_numeric($max[-1])) {
//                return preg_replace_callback('/(\d+)$/', function ($mathces) {
//                    return $mathces[1] + 1;
//                }, $max);
//            }
//
//            return "{$slug}-2";
//        }
//
//        return $slug;
//    }
//

}
