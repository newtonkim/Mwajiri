<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryStoreRequest;

class CountryController extends Controller
{
    public function index(Request $request)
    {

        $countries = Country::all();


        if($request->has('search')){
            $countries = Country::where('country_code', 'like', "%{$request->search}%")->orWhere('name', 'like', "%{$request->search}%")->get();
        }

        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]);

        return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
    }
}
