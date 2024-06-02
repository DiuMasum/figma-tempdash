<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::get('/admin/all-category', 'AllCategory')->name('allcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });

    Route::controller(BlogController::class)->group(function () {
        Route::get('/admin/add-blog', 'AddBlog')->name('addblog');
        Route::get('/admin/all-blog', 'AllBlog')->name('allblog');
        Route::post('/admin/store-blog', 'StoreBlog')->name('storeblog');
        Route::get('/admin/edit-blog/{id}', 'EditBlog')->name('editblog');
        Route::post('/admin/update-blog', 'UpdateBlog')->name('updateblog');
        Route::get('/admin/delete-blog/{id}', 'DeleteBlog')->name('deleteblog');
    });

     Route::controller(AuthorController::class)->group(function () {
        Route::get('/admin/add-author', 'AddAuthor')->name('addauthor');
        Route::get('/admin/all-author', 'AllAuthor')->name('allauthor');
        Route::post('/admin/store-author', 'StoreAuthor')->name('storeauthor');
        Route::get('/admin/edit-author/{id}', 'EditAuthor')->name('editauthor');
        Route::post('/admin/update-author', 'UpdateAuthor')->name('updateauthor');
        Route::get('/admin/delete-author/{id}', 'DeleteAuthor')->name('deleteauthor');
    });

});

Route::controller(NewsletterController::class)->group(function () {
    Route::get('/emaillist', 'EmaiLlist')->name('emaillist');
    Route::get('/newsletter', 'Newsletter')->name('newsletter');
    Route::get('/deleteemail/{id}', 'DeleteEmail')->name('deleteemail');
});

