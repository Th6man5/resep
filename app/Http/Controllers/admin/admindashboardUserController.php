<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Illuminate\Http\Request;

class AdmindashboardUserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('dashboard.admindashboard.user.index', [
            'title' => 'User List',
            'user' => User::orderBy('updated_at', 'DESC')->filter(request(['search']))->paginate(10)->onEachSide(1)->fragment('user'),


        ]);
    }

    public function destroy(User $user)
    {
        $user->Recipes()->delete();
        $user->delete();
        return redirect('admin/dashboard/user')->with('delete', 'User is successfully deleted');
    }
}
