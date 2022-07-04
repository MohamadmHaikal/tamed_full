<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Neighs = Neighborhood::all();
        return view('dashboard.Neighborhood.list', compact('Neighs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys = City::all();
        return view('dashboard.neighborhood.create', compact('citys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Neigh = new Neighborhood;
        $Neigh->name = $request->name;
        $Neigh->city_id = $request->city;
        $Neigh->save();
        return redirect()->route('neighborhood.list')->with('doneMessage', 'Neighborhood Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Neigh = Neighborhood::find($id);
        return view('dashboard.neighborhood.show', compact('Neigh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citys = City::all();
        $Neigh = Neighborhood::find($id);
        return view('dashboard.neighborhood.edit', compact('citys', 'Neigh'));
    }
    public function _getNeighbor($id)
    {
        $Neigh = Neighborhood::where('city_id', '=', $id)->get();
        return $Neigh;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Neigh = Neighborhood::find($id);
        $Neigh->name = $request->name;
        $Neigh->city_id = $request->city;
        $Neigh->save();
        return redirect()->route('neighborhood.list')->with('doneMessage', 'Neighborhood Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Neigh = Neighborhood::find($id);
        $Neigh->delete();
        return redirect()->route('neighborhood.list')->with('doneMessage', 'Neighborhood Deleted Successfully');
    }
}
