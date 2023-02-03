<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Ingredients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function downloadPDF()
    {
        $pdf = Pdf::loadView('pdf.invoice');
        return $pdf->download('invoice.pdf');
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
