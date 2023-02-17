<?php

namespace App\Http\Controllers\Admin;


use App\Models\Recipe;
use Illuminate\Http\Request;

class admindashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recipe $recipe)
    {
        return view('dashboard.admindashboard.recipe.index', [
            'title' => 'Recipe List',
            'recipe' => Recipe::orderBy('reads', 'DESC')->paginate(10)->onEachSide(1)->fragment('recipe'),


        ]);
    }



    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect('admin/dashboard/recipe')->with('delete', 'Recipe is successfully deleted');
    }
}
