<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

class admindashboardCategoryController
{
    public function index(Category $category)
    {
        return view('dashboard.admindashboard.category.index', [
            'title' => 'User List',
            'category' => Category::paginate(10)->onEachSide(1)->fragment('category'),
            'active' => 'user'

        ]);
    }

    public function create()
    {
        return view('dashboard.admindashboard.category.index', [
            'category' => Category::all(),
        ]);
    }

    public function store(Request $request, Category $category)
    {
        $CreateCategory = $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($CreateCategory);


        return redirect('admin/dashboard/category')->with('success', 'Category is successfully created!');
    }

    public function edit($id)
    {
        $category = Category::findorFail($id);

        return view('dashboard.userdashboard.recipe.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);


        Category::where('id', $category->id)
            ->update($validatedData);



        // Recipe::find($recipe->id)->update($EditRecipe);
        // dd($EditRecipe);
        return redirect('/admin/dashboard/category')->with('edit', 'Category <strong class="text-white">' . $category->name . '</strong> is succesfully Updated!');
    }
}
