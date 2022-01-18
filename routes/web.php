<?php

use App\Http\Livewire\ShowPosts;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowPosts::class)->name('dashboard');

Route::get('getMedia', function (){
    Post::first()
        ->addMedia(storage_path('demo/Captura de Pantalla 2021-12-06 a la(s) 12.42.24.png'))
        ->toMediaCollection();
});

Route::post('createMedia', [\App\Http\Controllers\MediaController::class, 'store'])->name('media.store');

Route::get('deletePost', function (){
    Post::find(4)->delete();
});

Route::get('downloadFile', function (){
    dd(Post::find(5)->getFirstMedia());

//    Download a simply file
//    $post = Post::first()->getFirstMedia();
//
//    return $post;

//    Downloading multiple files
    $post = Post::first()->getMedia();

    return MediaStream::create('our-files.zip')->addMedia($post);


});
