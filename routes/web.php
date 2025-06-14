<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/catalog/{category?}', [MainController::class, 'catalog'])->name('catalog');

Route::get('/news/show/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/recipe/show/{id}', [RecipeController::class, 'show'])->name('recipe.show');


Route::middleware(['auth', 'banned'])->group(function () { //auth middleware

    Route::prefix('recipe')->group(function () {
        Route::get('/create', [RecipeController::class, 'create'])->name('recipe.create');
        Route::post('/', [RecipeController::class, 'store'])->name('recipe.store');
        Route::get('/edit/{id}', [RecipeController::class, 'edit'])->name('recipe.edit');
        Route::patch('/{id}', [RecipeController::class, 'update'])->name('recipe.update');
        Route::delete('/{id}', [RecipeController::class, 'destroy'])->name('recipe.destroy');
    });


    Route::prefix('news')->group(function () {
        Route::get('/create', [MainController::class])->name('news.create');
        Route::post('/', [NewsController::class, 'store'])->name('news.store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::patch('/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    });


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'users'])->name('admin.index');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
        Route::get('/users/ban/{id}', [AdminController::class, 'ban'])->name('admin.users.ban');
        Route::get('/users/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

        Route::get('/recipes', [AdminController::class, 'recipes'])->name('admin.recipes.index');
        Route::get('/recipes/create', [AdminController::class, 'createRecipe'])->name('admin.recipes.create');
        Route::post('/recipes/store', [AdminController::class, 'storeRecipe'])->name('admin.recipes.store');
        Route::get('/recipes/edit/{id}', [AdminController::class, 'editRecipe'])->name('admin.recipes.edit');
        Route::patch('/recipes/{id}', [AdminController::class, 'updateRecipe'])->name('admin.recipes.update');
        Route::delete('/recipes/{id}', [AdminController::class, 'deleteRecipe'])->name('admin.recipes.delete');
        Route::get('/recipes/publish/{id}', [AdminController::class, 'publish'])->name('admin.recipes.publish');
    });
});

require __DIR__ . '/auth.php';
