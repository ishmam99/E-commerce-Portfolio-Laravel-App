<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\Website\HomeController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media as MediaAlias;

Route::middleware('web')->group(function () {
    Route::get('contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('/blogs',[HomeController::class,'blog'])->name('blogs');
    Route::get('/show-blogs/{id}', [HomeController::class, 'singleBlog'])->name('single.blog');
    Route::get('/product', [HomeController::class, 'product'])->name('products');
    Route::get('/product-category/{id}', [HomeController::class, 'product'])->name('products.category');
    Route::get('/category-product/{id}', [HomeController::class, 'categoryProduct'])->name('category_product');
    Route::get('/show-product/{id}', [HomeController::class, 'singleProduct'])->name('show_product');
    Route::post('message',[MessageController::class,'store'])->name('message.store');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'dashboard.dashboard')->name('dashboard');
    Route::get('message/{message}',[MessageController::class,'show'])->name('message.show');
    Route::get('message', [MessageController::class, 'index'])->name('message.index');
    Route::resource('blog', BlogController::class);
    Route::resource('user', UserController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('edit-profile', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::get('change_password', [UserController::class, 'change_password'])->name('change_password');
    Route::get('settings/company_settings', [SettingController::class, 'editCompanySetting'])->name('company.edit');
    Route::post('settings/company_setting', [SettingController::class, 'updateCompanySetting'])->name('company.update');
    Route::resource('sliders',SliderController::class);
    // Role Permission
    Route::resource('developer/permission', PermissionController::class)->only('index', 'store');
    Route::get('role/assign', [RoleController::class, 'roleAssign'])->name('role.assign');
    Route::post('role/assign', [RoleController::class, 'storeAssign'])->name('store.assign');
    Route::resource('role', RoleController::class);

    Route::delete('remove-media/{media}', function (MediaAlias $media) {
        $media->delete();
        return back()->with('success', 'Media successfully deleted.');
    })->name('remove-media');
});
