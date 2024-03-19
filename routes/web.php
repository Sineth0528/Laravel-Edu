<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("/contact", function () {
//     return view('home.contact');
// })->name('home.contact');

//simpliyfy Routes
// Route::view('/', 'welcome')->name('welcome');
// Route::view('/contact', 'home.contact')->name('home.contact');

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class)->name('single');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is Laravel Content',
        'is_new' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is PHP Content',
        'is_new' => false
    ]
];

Route::resource('posts', PostsController::class)
    ->only('index', 'show', 'create', 'store', 'edit');

// Route::get('/posts', function () use ($posts) {
//     return view('posts.index', ['data' => $posts]); //pass datato view blade
// })->name('posts.index');

// Route::get('/posts/{id}', function ($id) use ($posts) {
//     abort_if(!isset($posts[$id]), 404); //check post id
//     return view('posts.posts', ['data' => $posts[$id]]); //pass datato view blade
// })
//     // ->where([
//     //     'id' => '[0-9]+'
//     // ]) In this where use for verification,  And i am using this in RouteServiceProvider
//     ->name('posts.posts');

// Route::get('/past-posts/{days?}', function ($days = 10) {
//     return "Post number: " . $days;
// });

Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
    Route::get('/responses', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Kushan Sineth', 3600);
    })->name('responses');

    Route::get('/back', function () use ($posts) {
        return back();
    })->name('back');

    Route::get('/redirect', function () {
        return redirect()->route('posts.index', ['id' => 1]);
    })->name('redirect');

    Route::get('/away', function () {
        return redirect()->away('http://google.com');
    })->name('away');

    Route::get('/json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');

    Route::get('/download', function () {
        return response()->download(public_path('/1.jpg'));
    })->name('download');
});
