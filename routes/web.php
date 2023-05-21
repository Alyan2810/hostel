<?php

//use App\Models\Post;
use App\Http\Controllers;
use App\Models\Tenant;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TenantController as AdminTenanCtontroller;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\MypackageController as AdminMypackageController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;


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
   
    // if you don’t put with() here, you will have N+1 query performance problem
   // $posts = Post::with('category', 'tags')->take(5)->latest()->get();
    //return view('pages.home', compact('posts'));
  
    $tenants = Tenant::with('category', 'mypackage')->take(5)->latest()->get();
    return view('pages.home', compact('tenants'));
    
})->name('home');


// Route::post('posts', function (Request $request) {
   
//     echo "<pre>";
//     print_r($request);
//     echo "</pre>";
//     die;
   
// })->name('posts.search');


Route::post('posts', [PostController::class, 'search'])->name('posts.search');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('tenants', [TenantController::class, 'search'])->name('tenants.search');
Route::get('tenants', [TenantController::class, 'index'])->name('tenants.index');
Route::get('tenant/{id}', [TenantController::class, 'show'])->name('tenants.show');


Route::view('about', 'pages.about')->name('about');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('tenants', AdminTenanCtontroller::class);
    Route::resource('mypackages', AdminMypackageController::class);
    Route::resource('payments', AdminPaymentController::class);
    Route::resource('tags', AdminTagController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('posts', AdminPostController::class);
});

Route::group(['middleware' => 'auth'], function () {
Route::resource('tasks', TaskController::class);
});
require __DIR__.'/auth.php';
