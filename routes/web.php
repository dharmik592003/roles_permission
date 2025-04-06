<?php
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    //route for permission

    Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::post('/permission/{id}/update', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permission/{id}/delete', [PermissionController::class, 'destroy'])->name('permission.delete');
    //route for roles

    Route::get('/Role', [RoleController::class, 'index'])->name('Role');
    Route::get('/Role/create', [RoleController::class, 'create'])->name('Role.create');
    Route::get('/Role/{id}/edit', [RoleController::class, 'edit'])->name('Role.edit');
    Route::post('/Role', [RoleController::class, 'store'])->name('Role.store');
    Route::post('/Role/{id}/update', [RoleController::class, 'update'])->name('Role.update');
    Route::get('/Role/{id}/delete', [RoleController::class, 'destroy'])->name('Role.delete');


      //route for Articles
    Route::get('/Article', [ArticleController::class, 'index'])->name('Article');
    Route::get('/Article/create', [ArticleController::class, 'create'])->name('Article.create');
    Route::get('/Article/{id}/edit', [ArticleController::class, 'edit'])->name('Article.edit');
    Route::post('/Article', [ArticleController::class, 'store'])->name('Article.store');
    Route::post('/Article/{id}/update', [ArticleController::class, 'update'])->name('Article.update');
    Route::get('/Article/{id}/delete', [ArticleController::class, 'destroy'])->name('Article.delete');
    
    
Route::get('/User', [UserController::class, 'index'])->name('User');
Route::get('/User/create', [UserController::class, 'create'])->name('User.create');
Route::get('/User/{id}/edit', [UserController::class, 'edit'])->name('User.edit');
Route::post('/User', [UserController::class, 'store'])->name('User.store');
Route::post('/User/{id}/update', [UserController::class, 'update'])->name('User.update');
Route::get('/User/{id}/delete', [UserController::class, 'destroy'])->name('User.delete');});

require __DIR__ . '/auth.php';
