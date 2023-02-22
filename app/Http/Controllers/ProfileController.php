<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191'],
            'username' => [
                'required', 'alpha_num', 'min:3', 'max:100',
                Rule::unique('users')->ignore(auth()->id()),
            ],
            'email' => [
                'required', 'email:dns',
                Rule::unique('users')->ignore(auth()->id()),
            ],
            'profile_picture' => ['image', 'max:2000'], // Limit file size to 2MB
        ]);

        $user_id = auth()->id();
        $user = User::findOrFail($user_id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->hasFile('profile_picture')) {
            // Remove old profile picture if exists
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Store new profile picture
            $file = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $file;
        }

        $user->save();

        return back()->with('message', 'User Profile Successfully updated');
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
