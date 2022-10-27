<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Str;

class RecipeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recipe $recipe)
    {
        return view('dashboard.recipe.index', [
            'title' => 'Recipe',
            'active' => 'recipe',
            'recipe' => Recipe::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.recipe.create', [
            'title' => 'Create Recipe',
            'active' => 'recipe',
            'category' => Category::all(),
            'country' => Country::all(),
            'user' => User::all()
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
            'recipe_name' => 'required',
            'about' => 'required',
            'portion' => 'required',
            'time' => 'required',
            'steps' => 'required',
            'ingredients' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
        ]);

        $CreateRecipe['user_id'] = auth()->user()->id;
        Recipe::create($CreateRecipe);

        // $table->string('recipe_name');
        // $table->string('about');
        // $table->string('slug')->unique();
        // $table->string('portion');
        // $table->string('time');
        // $table->string('steps', 10000);
        // $table->foreignId('country_id');
        // $table->foreignId('category_id');
        // $table->foreignId('user_id');
        // $table->text('ingredients');
        return redirect('dashboard/recipe')->with('success', 'Recipe Is Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect('dashboard/recipe')->with('delete', 'Recipe is successfully deleted');
    }
}
