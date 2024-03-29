<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RecipeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recipe $recipe)
    {
        return view('dashboard.userdashboard.recipe.index', [
            'title' => 'Dashboard',
            'active' => 'recipe',
            'recipe' => Recipe::where('user_id', auth()->user()->id)->filter(request(['search']))->orderBy('updated_at', 'DESC')->paginate(10)->onEachSide(1)->fragment('recipe'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.userdashboard.recipe.create', [
            'title' => 'Create Recipe',
            'active' => 'recipe',
            'category' => Category::all(),
            'country' => Country::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Recipe $recipe)
    {
        $CreateRecipe = $request->validate([
            'image' => 'required|image|file|max:3072',
            'recipe_name' => 'required|max:255',
            'about' => 'required|max:255',
            'portion' => 'required|max:20',
            'time' => 'required|max:20',
            'steps' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
        ]);

        if ($request->file('image')) {
            $CreateRecipe['image'] = $request->file('image')->store('recipes-images');
        }

        $CreateRecipe['user_id'] = auth()->user()->id;
        Recipe::create($CreateRecipe);


        return redirect('user/dashboard/recipe')->with('success', 'Recipe Is Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findorFail($id);

        return view('dashboard.userdashboard.recipe.edit', [
            "active" => 'recipe',
            'recipe' => $recipe,
            'title' => 'Edit Recipe',
            'category' => Category::all(),
            'country' => Country::all(),

        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $rules = [
            'image' => 'required|image|file|max:3072',
            'recipe_name' => 'required|max:255',
            'about' => 'required|max:255',
            'portion' => 'required|max:20',
            'time' => 'required|max:20',
            'steps' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($recipe->image) {
                Storage::delete($recipe->image);
            }
            $validatedData['image'] = $request->file('image')->store('recipes-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $recipe->update($validatedData);

        return redirect('/user/dashboard/recipe')->with('edit', 'Recipe <strong class="text-white">' . $recipe->recipe_name . '</strong> is successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect('user/dashboard/recipe')->with('delete', 'Recipe <strong class="text-white">  ' . $recipe->recipe_name . '</strong> is successfully Deleted!');
    }
}
