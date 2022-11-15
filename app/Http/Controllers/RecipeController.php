<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Ingredients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('name', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('maker')) {
            $maker = User::firstWhere('name', request('maker'));
            $title = ' by ' . $maker->name;
        }

        if (request('country')) {
            $country = Country::firstWhere('name', request('country'));
            $title = ' in ' . $country->name;
        }

        return view('home', [
            "title" => "Home" . $title,
            "active" => 'home',
            "recipe" => Recipe::orderBy('reads', 'DESC')->filter(request(['search', 'category', 'maker', 'country']))->paginate(9)->withQueryString()

        ]);
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
        $recipe->incrementReadCount();
        return view(
            'recipe',
            compact($recipe),
            [
                "title" =>  $recipe->recipe_name,
                "active" => 'home',
                "recipe" => $recipe,
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
