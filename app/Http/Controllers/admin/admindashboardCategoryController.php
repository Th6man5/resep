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
}
