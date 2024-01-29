<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomerController;
//Resource Route
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// --------------Custom Login Section-----------------------

// Route::get('/dashboard', function () {
//     return view('auth.dashboard');
// })->middleware('auth');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');

Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
Route::get('/login', [CustomAuthController::class, 'login'])->name('login');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('checkRole:SuperAdmin,Admin');

Route::post('/register', [CustomAuthController::class, 'store'])->name('auth.store');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('auth.authentication');

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
// ---------------Custom Login Section End--------------------


Route::middleware('auth')->group(function () {
    //Post Section
    //Input Form
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    //Input Data Store (Back-End)
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    //Dashboard Data Table
    Route::get('/allpost', [PostController::class, 'allpost'])->name('posts.allpost');
    //Show Specific Data Table
    Route::get('/allposts/{post}', [PostController::class, 'show'])->name('posts.show');
    //Edit Specific Data Table
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    //Update Specific Data Table
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    //Delete Specific Data Table
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    //Category Section
    //Input Form
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    //Input Data Store (Back-End)
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    //Dashboard Data Table
    Route::get('/allcategory', [CategoryController::class, 'allcategory'])->name('category.allcategory');
    //Show Specific Data Table
    Route::get('/allcategory/{category}', [CategoryController::class, 'show'])->name('category.show');
    //Edit Specific Data Table  
    Route::get('/categorys/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    //Update Specific Data Table
    Route::put('/categorys/{category}', [CategoryController::class, 'update'])->name('category.update');
    //Delete Specific Data Table
    Route::delete('/categorys/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});


//Public Data Table
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Public Show Specific Data Table 
Route::get('/publicshow/{post}', [PostController::class, 'publicshow'])->name('posts.publicshow');

//Public Show Filterable Post
Route::get('/filterblogs', [PostController::class, 'filterblogs'])->name('posts.filterblogs');


//Resource Route
Route::resource('tests', TestController::class);

Route::resource('roles', RoleController::class);
Route::resource('customers', CustomerController::class);

Route::post('user/admin/create', [UserController::class, 'adminCreate'])->name('admin.create');

