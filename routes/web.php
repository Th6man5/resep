<?php

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/about', function () {
//     return view('about', [
//         'title' => 'About',
//         'active' => 'about'
//     ]);
// });

//Login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
