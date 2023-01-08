<?php


use App\Models\User;
use App\Models\Recipe;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\admin\admindashboardController;
use App\Http\Controllers\user\RecipeDashboardController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

Route::get('/maker/{user:id}', [GuestController::class, 'index']);

Route::get('/', [RecipeController::class, 'index']);

//User Route

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth']
], function () {

    Route::get('/dashboard', function (Recipe $recipe) {

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'home',
        ]);
    });

    Route::get('/dashboard/settings', function (Recipe $recipe) {

        return view('dashboard.userdashboard.setting.index', [
            'title' => 'Settings',
            'active' => 'home',
        ]);
    });

    Route::put('/dashboard/update', [ProfileController::class, 'update']);

    Route::resource('/dashboard/recipe', RecipeDashboardController::class);

    Route::get('/dashboard/report', function (Recipe $recipe) {
        return view('dashboard.userdashboard.report.index', [
            'title' => 'Report',
            'active' => 'report',
            'recipe' => Recipe::where('user_id', auth()->user()->id)->orderBy('reads', 'DESC')->get(),
            'view' => Recipe::where('user_id', auth()->user()->id)->sum('reads')
        ]);
    });
});

//Admin Route

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth']

], function () {
    Route::get('/dashboard', function (Recipe $recipe) {
        return view('dashboard.admindashboard.index', [
            'title' => 'Admin',
            'recipe' => Recipe::all(),
            'user' => User::all(),
            'active' => 'dashboard'
        ]);
    });

    Route::resource('/dashboard/recipe', admindashboardController::class)->except(['show', 'update', 'edit', 'store', 'create']);

    // Route::resource('/dashboard/users', admindashboardUserController::class);
});




//login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/{recipe:id}', [RecipeController::class, 'show']);

// Route::resource('/dashboard/user', UserDashboardController::class)
//     ->middleware('auth');

// Route::get('/makers/{maker:username}', function (User $maker) {
//     return view('recipe', [
//         'title' => "Post By : $maker->name",
//         'active' => 'recipe',
//         'recipe' => $maker->recipe->load('category', 'maker'),
//     ]);
// });

// Route::get('/categories/{category:name}', function ($category) {
//     return view('recipe', [
//         'title' => " Post by Category : $category->name",
//         'active' => 'categories',
//         'recipe' => $category->recipe->load('category', 'maker'),
//     ]);
// });