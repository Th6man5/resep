<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

class AdmindashboardCategoryController
{
    public function index(Category $category)
    {
        return view('dashboard.admindashboard.category.index', [
            'title' => 'Category List',
            'category' => Category::paginate(10)->onEachSide(1)->fragment('category'),


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

    // public function edit($id)
    // {
    //     $category = Category::findorFail($id);

    //     return view('dashboard.admindashboard.category.index', [
    //         'category' => $category,
    //     ]);
    // }

    public function update(Request $request)
    {
        $category = Category::findOrFail($request->input('category_id'));

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191', 'required'],
        ]);

        $category->name = $request->name;
        $category->save();

        return back()->with('success', 'Category <strong class="text-slate-600">' . $category->name . '</strong> is succesfully Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/dashboard/category')->with('delete', 'Category is successfully deleted');
    }
}
