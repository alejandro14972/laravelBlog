<?php

use App\Http\Controllers\DashboardController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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

//rutas publicas
Route::get('/', function () {
    return view('allPosts', [
        'posts'=>Post::where('active', true)->get()
    ]);
});



//rutas privadas

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/', [PostController::class, 'publicIndex'])->name('public.posts.index');




route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/category/{category_id}', [PostController::class, 'postsByCategory'])->name('posts.category');
route::get('/posts/{id}', [PostController::class, 'view'])->name('posts.view'); 
route::post('/posts', [PostController::class, 'store'])->name('posts.store');
route::get('/posts/viewEdit/{id}', [PostController::class, 'viewUpdate'])->name('posts.viewUpdate');
route::get('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');
route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
