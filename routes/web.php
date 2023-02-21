<?php


use App\Models\User;
use App\Models\Recipe;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\admin\admindashboardController;
use App\Http\Controllers\user\RecipeDashboardController;
use App\Http\Controllers\admin\admindashboardUserController;
use App\Http\Controllers\admin\admindashboardCountryController;
use App\Http\Controllers\admin\admindashboardCategoryController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


Route::get('/maker/{user:id}', [GuestController::class, 'index']);

Route::get('/', [RecipeController::class, 'index']);


//User Route

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth']
], function () {

    Route::delete('/dashboard/unbookmark', [RecipeController::class, 'unbookmark'])->name('recipes.unbookmark');

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/dashboard/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('/dashboard/settings/change-password', [SettingsController::class, 'show'])->name('password.show');
    Route::post('/dashboard/settings/change-password', [SettingsController::class, 'update'])->name('password.update');

    Route::put('/dashboard/update', [ProfileController::class, 'update']);

    Route::resource('/dashboard/recipe', RecipeDashboardController::class);

    Route::get('/dashboard/report', function (Recipe $recipe) {
        $save = auth()->user()->bookmarks;
        $saved = $save->load('recipe');
        return view('dashboard.userdashboard.report.index', [
            'title' => 'Report',
            'active' => 'report',
            'saved' => $saved,
            'recipe' => Recipe::where('user_id', auth()->user()->id)->orderBy('reads', 'DESC')->paginate(15)->onEachSide(1)->fragment('recipe'),
            'view' => Recipe::where('user_id', auth()->user()->id)->sum('reads')
        ]);
    });
});

//Admin Route

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'admin']

], function () {
    Route::get('/dashboard', function (Recipe $recipe) {
        return view('dashboard.admindashboard.index', [
            'title' => 'Admin',
            'recipe' => Recipe::all(),
            'user' => User::all(),
            'category' => Category::all(),
            'country' => Country::all(),
            'active' => 'dashboard'
        ]);
    });

    Route::resource('/dashboard/recipe', admindashboardController::class)->except(['show', 'update', 'edit', 'store', 'create']);

    Route::resource('/dashboard/user', admindashboardUserController::class)->except(['show', 'update', 'edit', 'store', 'create']);

    Route::resource('/dashboard/category', admindashboardCategoryController::class);
    Route::put('/dashboard/category/update', [admindashboardCategoryController::class, 'update']);

    Route::resource('/dashboard/country', admindashboardCountryController::class);
    Route::put('/dashboard/country/update', [admindashboardCountryController::class, 'update']);
});


//login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/{recipe:id}', [RecipeController::class, 'show'])->name('recipe');


Route::group(
    [
        'middleware' => ['auth']
    ],
    function () {
        Route::post('/{recipe:id}', [RecipeController::class, 'bookmark'])->name('recipes.bookmark');
        Route::resource('/{recipe:id}/comments', CommentController::class)->only(['store']);
        Route::delete('/{recipe:id}/unbookmark', [RecipeController::class, 'unbookmark'])->name('recipes.unbookmark');
        Route::get('/{recipe:id}/generate_pdf', [RecipeController::class, 'downloadPDF'])->name('generate_pdf');
    }
);
