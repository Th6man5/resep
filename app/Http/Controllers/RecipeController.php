<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Country;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Ingredients;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            "recipe" => Recipe::orderBy('reads', 'DESC')->filter(request(['search', 'maker']))->paginate(18)->withQueryString()->onEachSide(2)->fragment('recipe'),

        ]);
    }

    public function downloadPDF($id)
    {

        $recipe = Recipe::findOrFail($id);
        $pdf = Pdf::loadView('pdf.invoice', [
            'recipe' => $recipe
        ]);

        return $pdf->download(Str::slug($recipe->recipe_name) . '.pdf');
    }

    public function bookmark(Recipe $recipe, Bookmark $bookmark)
    {
        $bookmark = new Bookmark;
        $bookmark->user_id = auth()->user()->id;
        $bookmark->recipe_id = $recipe->id;
        $bookmark->save();

        return back();
    }

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $isBookmarked = false;

        if (Auth::check()) {
            $bookmarks = auth()->user()->bookmarks;
            $isBookmarked = $bookmarks->contains('recipe_id', $recipe->id);
        }

        $recipe->incrementReadCount();
        return view(
            'recipe',
            compact($recipe),
            [
                "title" =>  $recipe->recipe_name,
                "active" => 'home',
                "recipe" => $recipe,
                'isBookmarked' => $isBookmarked,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
