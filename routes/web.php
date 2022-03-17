<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});


Route::get('post', function ($slug) {
    $path = __DIR__ . "/../resources/posts/($slug).html";
     if (! file_exists($path)) {
        dd('file does not exist');
     };
    
     return view('post', [
        'post' => file_get_contents(__DIR__ . /../resources/posts/my-first-post.html);
        ]);
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
