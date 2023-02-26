<?php

namespace App\Http\Controllers\Admin;


use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmindashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recipe $recipe)
    {
        $recipe = Recipe::select('recipes.*', DB::raw('COUNT(views.id) as view'))
            ->leftJoin('views', 'views.recipe_id', '=', 'recipes.id')
            ->groupBy('recipes.id')
            ->orderBy('view', 'DESC')
            ->filter(request(['search', 'maker']))
            ->paginate(15)
            ->onEachSide(1)
            ->fragment('recipe');


        return view('dashboard.admindashboard.recipe.index', [
            'title' => 'Recipe List',
            'recipe' => $recipe,


        ]);
    }



    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect('admin/dashboard/recipe')->with('delete', 'Recipe is successfully deleted');
    }
}
