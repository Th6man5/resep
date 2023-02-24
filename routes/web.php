<?php


use App\Models\User;
use App\Models\Recipe;
use App\Models\Country;
use App\Models\Report;
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
use App\Http\Controllers\admin\AdmindashboardController;
use App\Http\Controllers\admin\AdmindashboardReportController;
use App\Http\Controllers\user\RecipeDashboardController;
use App\Http\Controllers\admin\AdmindashboardUserController;
use App\Http\Controllers\admin\AdmindashboardCountryController;
use App\Http\Controllers\admin\AdmindashboardCategoryController;
use App\Http\Controllers\User\DashboardReportController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


Route::get('/maker/{user:id}', [GuestController::class, 'index']);

Route::get('/', [RecipeController::class, 'index'])->name('home');


//User Route

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth']
], function () {
    // Route::get('/dashboard/report/generate_pdf', [DashboardReportController::class, 'downloadPDF'])->name('report.generate_pdf');

    Route::delete('/dashboard/unbookmark', [RecipeController::class, 'unbookmark'])->name('recipes.unbookmark');

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/dashboard/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('/dashboard/settings/change-password', [SettingsController::class, 'show'])->name('password.show');
    Route::post('/dashboard/settings/change-password', [SettingsController::class, 'update'])->name('password.update');

    Route::put('/dashboard/update', [ProfileController::class, 'update']);

    Route::resource('/dashboard/recipe', RecipeDashboardController::class);

    Route::get('/dashboard/report', [DashboardReportController::class, 'index']);
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
            'report' => Report::all(),
            'active' => 'dashboard'
        ]);
    });

    Route::resource('/test', RecipeController::class);


    Route::resource('/dashboard/recipe', AdmindashboardController::class)->except(['show', 'update', 'edit', 'store', 'create']);

    Route::resource('/dashboard/user', AdmindashboardUserController::class)->except(['show', 'update', 'edit', 'store', 'create']);

    Route::resource('/dashboard/report', AdmindashboardReportController::class)->except(['show', 'update', 'edit', 'store', 'create']);
    Route::delete('dashboard/report/{recipe:id}/destroy-with-recipe', [AdmindashboardReportController::class, 'destroyWithRecipe'])->name('dashboard.report.destroy-with-recipe');


    Route::resource('/dashboard/category', AdmindashboardCategoryController::class);
    Route::put('/dashboard/category/update', [AdmindashboardCategoryController::class, 'update']);

    Route::resource('/dashboard/country', AdmindashboardCountryController::class);
    Route::put('/dashboard/country/update', [AdmindashboardCountryController::class, 'update']);
});


//login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
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
        Route::post('/{recipe:id}/rate', [RecipeController::class, 'rate'])->name('recipes.rate');
        Route::resource('/{recipe:id}/comments', CommentController::class)->only(['store']);
        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
        Route::delete('/{recipe:id}/unbookmark', [RecipeController::class, 'unbookmark'])->name('recipes.unbookmark');
        // Route::get('/{recipe:id}/generate_pdf', [RecipeController::class, 'downloadPDF'])->name('generate_pdf');
        Route::post('/{recipes:id}/report', [RecipeController::class, 'report'])->name('recipes.report');
    }
);

Route::get('/{any}', function () {
    return abort(404);
})->where('any', '.*');
