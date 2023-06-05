<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug'];

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }

//
//
/*
 * second variant
 * php artisan make:migration create_post_tag_table --create
 * add to migration
 * $table->usignedBigInteger('post_ig')
 * $table->usignedBigInteger('tag_ig')
*/

//    public function posts() {
//        return $this->belongsToMany(Post::class);
//    }
}
