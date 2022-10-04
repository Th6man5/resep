<?php

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipeDashboardController;


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

Route::get('/', function (Recipe $recipe) {
    return view('home', [
        'title' => 'Home',
        'active' => 'home',
        'recipe' => Recipe::all(),
    ]);
});




Route::get('/dashboard', function (Recipe $recipe) {
    return view('dashboard.index', [
        'title' => 'Home',
        'active' => 'home',
    ]);
})->middleware('auth');

Route::resource('/dashboard/recipe', RecipeDashboardController::class)
    ->middleware('auth');



//login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/{recipe:slug}', [RecipeController::class, 'show']);
