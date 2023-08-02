<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DivController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\PostTasksController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\RowController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::post('/upload', [PostTasksController::class, 'upload']);


Route::get('/', [FrontController::class, 'index'])->name('front_index');
Route::get('/post_details/{id}/{slug?}', [FrontController::class, 'post_details'])->middleware('increaseBlog.views')->name('post_details');
Route::get('/contact', [FrontController::class, 'contactIndex'])->name('contact');
Route::post('/contact_store', [FrontController::class, 'contact_store'])->name('contact_store');
Route::get('/image_albums', [FrontController::class, 'image_albums'])->name('image_albums');
Route::get('/video_library', [FrontController::class, 'video_library'])->name('video_library');
Route::get('/album_details/{id}', [FrontController::class, 'album_details'])->name('album_details');
Route::get('/category/{id}', [FrontController::class, 'category'])->name('category');
Route::get('/library_details/{id}', [FrontController::class, 'library_details'])->middleware('increase.views')->name('library_details');
Route::get('/get_last_news_ajax/{id}', [FrontController::class, 'get_last_news_ajax'])->name('get_last_news_ajax');
Route::get('/get_last_news_ajax_by_name/{name}', [FrontController::class, 'get_last_news_ajax_by_name'])->name('get_last_news_ajax_by_name');


Route::group([
   'prefix' => LaravelLocalization::setLocale(),
   'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
   Route::middleware(['redirect.prefix'])->get('/login', function () {
      return view('auth.login');
   });

   route::middleware(['auth:admin,author'])->get('home', [HomeController::class, 'index'])->name('home');
   route::middleware(['auth:admin,author'])->post('comments_enabled', [HomeController::class, 'comments_enabled'])->name('comments_enabled');

   Route::prefix('cms/')->middleware(['guest:admin,author'])->group(function () {
      route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
   });
   Route::prefix('cms/admin')->middleware(['auth:admin,author'])->group(function () {

      Route::resource('divs', DivController::class);
      Route::post('divs_update/{div}', [DivController::class, 'update'])->name('divs_update');

      Route::resource('categories', CategoryController::class);
      Route::post('categories_update/{id}', [CategoryController::class, 'update'])->name('categories_update');
      Route::resource('albums', AlbumController::class);
      Route::post('albums_update/{id}', [AlbumController::class, 'update'])->name('albums_update');

      Route::resource('libraries', LibraryController::class);
      Route::post('libraries_update/{id}', [LibraryController::class, 'update'])->name('libraries_update');

      Route::resource('rows', RowController::class);
      Route::post('rows_update/{id}', [RowController::class, 'update'])->name('rows_update');


      Route::resource('photos', PhotosController::class);
      Route::post('photos_update/{id}', [PhotosController::class, 'update'])->name('photos_update');

      Route::get('photos_create/{id}', [PhotosController::class, 'create'])->name('photos_create');
      Route::get('photos_index/{id}', [PhotosController::class, 'index'])->name('photos_index');

      Route::resource('videos', VideosController::class);
      Route::post('videos_update/{id}', [VideosController::class, 'update'])->name('videos_update');

      Route::get('videos_create/{id}', [VideosController::class, 'create'])->name('videos_create');
      Route::get('videos_index/{id}', [VideosController::class, 'index'])->name('videos_index');


      Route::resource('blogs', BlogsController::class);
      Route::post('blogs_update/{id}', [BlogsController::class, 'update'])->name('blogs_update');

      Route::resource('about_us', AboutUsController::class);

      Route::resource('admins', AdminController::class);
      Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');
      Route::resource('authors', AuthorController::class);
      Route::post('authors_update/{id}', [AuthorController::class, 'update'])->name('authors_update');

      Route::resource('roles', RoleController::class);
      Route::post('roles_update/{id}', [RoleController::class, 'update'])->name('roles_update');

      Route::resource('permissions', PermissionController::class);
      Route::post('permissions_update/{id}', [PermissionController::class, 'update'])->name('permissions_update');

      Route::resource('roles.permissions', RolePermissionController::class);
   });
});
