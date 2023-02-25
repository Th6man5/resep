<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\Rating;
use App\Models\Recipe;
use App\Models\Report;
use App\Models\Country;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Ingredients;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "active" => 'home',
            "recipe" => Recipe::orderBy('updated_at', 'DESC')->filter(request(['search', 'maker']))->paginate(18)->withQueryString()->onEachSide(2)->fragment('recipe'),

        ]);
    }

    //PDF DOWNLOAD

    // public function downloadPDF($id)
    // {

    //     $recipe = Recipe::findOrFail($id);
    //     $pdf = Pdf::loadView('pdf.recipe', [
    //         'recipe' => $recipe
    //     ]);

    //     return $pdf->download(Str::slug($recipe->recipe_name) . '.pdf');
    // }

    //BOOKMARK

    public function bookmark(Recipe $recipe, Bookmark $bookmark)
    {
        $bookmark = new Bookmark;
        $bookmark->user_id = auth()->user()->id;
        $bookmark->recipe_id = $recipe->id;
        $bookmark->save();

        return back()->with('success', 'Recipe successfully Bookmarked');
    }

    //UnBOOMARK
    public function unbookmark(Recipe $recipe)
    {
        $bookmark = Bookmark::where('recipe_id', $recipe->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
        }

        return back()->with('success', 'Recipe successfully Unbookmarked');
    }

    //RATING

    public function rate(Request $request, $recipe)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $user = auth()->user();
        $recipeModel = Recipe::findOrFail($recipe);
        $rating = Rating::where('recipe_id', $recipeModel->id)
            ->where('user_id', $user->id)
            ->first();

        if ($rating) {
            $rating->rating = $validatedData['rating'];
            $rating->save();
        } else {
            $rating = new Rating;
            $rating->recipe_id = $recipeModel->id;
            $rating->user_id = $user->id;
            $rating->rating = $validatedData['rating'];
            $rating->save();
        }

        return back();
    }

    //RECIPE VIEW
    public function show(Recipe $recipe)
    {
        $isBookmarked = false;

        if (Auth::check()) {
            $bookmarks = auth()->user()->bookmarks;
            $isBookmarked = $bookmarks->contains('recipe_id', $recipe->id);
        }

        $userRating = Rating::where('recipe_id', $recipe->id)
            ->where('user_id', auth()->id())
            ->value('rating');

        $view = null;

        if (auth()->check()) {
            $user = auth()->user();
            $view = View::where('user_id', $user->id)
                ->where('recipe_id', $recipe->id)
                ->first();

            if (!$view) {
                $view = new View([
                    'user_id' => $user->id,
                    'recipe_id' => $recipe->id,
                ]);
                $view->save();
            }
        }

        return view('recipe', [
            'title' => $recipe->recipe_name,
            'active' => 'home',
            'recipe' => $recipe,
            'isBookmarked' => $isBookmarked,
            'userRating' => $userRating,
            'view' => $view
        ]);
    }


    // CREATE REPORT
    public function report(Request $request, $id)
    {

        $recipe = Recipe::findOrFail($id);


        $validatedData = $request->validate([
            'reason' => 'required',
            'details' => 'nullable',
        ]);


        $report = new Report;
        $report->reason = $validatedData['reason'];
        $report->details = $validatedData['details'];
        $report->user_id = Auth::user()->id;
        $recipe->reports()->save($report);


        return redirect()->back()->with('success', 'Thank you for your report.');
    }
}
