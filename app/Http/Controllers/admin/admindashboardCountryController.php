<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;

class admindashboardCountryController
{
    public function index(Country $country)
    {
        return view('dashboard.admindashboard.country.index', [
            'title' => 'Country List',
            'country' => Country::paginate(10)->onEachSide(1)->fragment('country'),

        ]);
    }

    public function store(Request $request, Country $country)
    {
        $CreateCountry = $request->validate([
            'name' => 'required|max:255',
        ]);

        Country::create($CreateCountry);


        return redirect('admin/dashboard/country')->with('success', 'Category is successfully created!');
    }

    public function update(Request $request)
    {
        $country = Country::findOrFail($request->input('country_id'));

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191', 'required'],
        ]);

        $country->name = $request->name;
        $country->save();

        return back()->with('success', 'country <strong class="text-slate-600">' . $country->name . '</strong> is succesfully Updated!');
    }
}
