<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SignUpController;
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

Route::get('/', [RecipeController::class, 'index'])->name('index');

Route::post('/search', [RecipeController::class, 'recipes_for_search'])->name('search');

Route::resource('recipes', RecipeController::class);

Route::get('/recipes/user/{user}', [RecipeController::class, 'myRecipes'])->name('recipes.myRecipes');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
Route::put('/profile/{user}', [LoginController::class, 'update'])->name('update_profile');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/sign_up', [SignUpController::class, 'create'])->name('sign_up');

Route::post('/sign_up', [SignUpController::class, 'store'])->name('sign_up_store');

/* Start Comment Routes */
Route::post('/comment/create/{recipe}', [CommentController::class, 'store'])->name('comments.store');

/* End Comment Routes */
