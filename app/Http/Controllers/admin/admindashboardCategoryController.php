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
            'user' => Category::paginate(10)->onEachSide(1)->fragment('category'),
            'active' => 'user'

        ]);
    }
}
