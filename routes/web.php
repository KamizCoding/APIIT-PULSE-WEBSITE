<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TemplateController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

route::get('/', [TemplateController::class, 'index']);
route::get('/blog', [TemplateController::class, 'blog']);
route::get('/contact', [TemplateController::class, 'contact']);
route::post('/contact_us', [TemplateController::class, 'contact_us']);
route::get('/new_blog_post', [AdminController::class, 'new_blog_post']);
route::post('/new_post', [AdminController::class, 'new_post']);
route::post('/new_user_post', [TemplateController::class, 'new_user_post']);
route::get('/show_blog_posts', [AdminController::class, 'show_blog_posts']);
route::get('/show_users', [AdminController::class, 'show_users']);
route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
route::get('/expandpost/{id}', [TemplateController::class, 'expandpost']);
route::get('/delete_blog_post/{id}', [AdminController::class, 'delete_blog_post']);
route::get('/delete_my_blog_post/{id}', [TemplateController::class, 'delete_my_blog_post'])->middleware('auth');
route::get('/my_post_update/{id}', [TemplateController::class, 'my_post_update'])->middleware('auth');
route::post('/update_user_post/{id}', [TemplateController::class, 'update_user_post'])->middleware('auth');
route::get('/createblogpost', [TemplateController::class, 'createblogpost'])->middleware('auth');
route::get('/myblogposts', [TemplateController::class, 'myblogposts'])->middleware('auth');
route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);
Route::get('/search', [TemplateController::class, 'search']);
Route::post('/posts/{post}/like', [TemplateController::class, 'like'])->name('post.like');
Route::delete('/posts/{post}/unlike', [TemplateController::class, 'unlike'])->name('post.unlike');


Route::middleware('admin:admin')->group(function (){
    Route::get('admin/login',[AdminController::class, 'loginForm']);
    Route::post('admin/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth:admin');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('FrontendPages.master');
    })->name('dashboard');
});