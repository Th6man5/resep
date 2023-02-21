<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SettingsController extends Controller
{

    public function index()
    {
        return view('dashboard.userdashboard.setting.index', [
            'title' => 'Settings',
            'active' => 'Settings',
        ]);
    }

    public function show()
    {
        return view('dashboard.userdashboard.setting.change', [
            'title' => 'Password Change',
            'active' => 'Settings',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:4',
        ]);

        $user = User::find(Auth::id());
        $currentPassword = $user->password;
        $inputPassword = $request->input('current_password');

        if (Hash::check($inputPassword, $currentPassword)) {
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('user.password.show')->with('success', 'Password changed successfully!');
        } else {
            return back()->withErrors(['current_password' => 'Incorrect password']);
        }
    }
}
