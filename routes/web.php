<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{slug}', 'ShowController')->name('post.show');
    Route::get('/posts/{slug}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{slug}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{slug}', 'DestroyController')->name('post.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\Tag'], function() {
    Route::get('/tags', 'IndexController')->name('tag.index');
    Route::get('/tags/create', 'CreateController')->name('tag.create');
    Route::post('/tags', 'StoreController')->name('tag.store');
    Route::get('/tags/{slug}', 'ShowController')->name('tag.show');
    Route::get('/tags/{slug}/edit', 'EditController')->name('tag.edit');
    Route::patch('/tags/{slug}', 'UpdateController')->name('tag.update');
    Route::delete('/tags/{slug}', 'DestroyController')->name('tag.delete');
});


Route::get('/about',[AboutController::class, 'index'])->name('about.index');

Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
