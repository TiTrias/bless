<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class LocationsController extends Controller
{
    //
    public function create(Request $request)
    {
        $this->authorize(Location::class);
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
            'meals' => 'required|integer',
            'comment' => 'nullable'
        ]);
        $user = Auth::user();

        $point = new Point($request->input('latitude'), $request->input('longitude'));

        $location = new Location();
        $location->fill($validatedData);
        $location->location = $point;
        $location->user_id = $user->id;
        $location->group_id = $user->group_id;

        $location->save();
        return back()->with('message', __('Done'));
    }

    public function path(Request $request)
    {
        $this->authorize(Location::class);
        $user = Auth::user();
        $group = $user->group;
        $locations = $group->locations->toArray();
        $data = compact('group', 'locations');
        return view('locations.path', $data);
    }
}
