<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\AdditionalActivitie;
use App\Models\UserActivities;
use Illuminate\Http\Request;

class AdditionalActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = AdditionalActivitie::all();
        $mainActivitys = Activitie::all();
        return view('addItem.AdditionalActivitie.index', compact('activities', 'mainActivitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mainActivitys = Activitie::all();
        return view('addItem.AdditionalActivitie.create', compact('mainActivitys'));
    }
    public function _getAdditional($id)
    {
        $activities = AdditionalActivitie::where('activitie_id', '=', $id)->get();
        return $activities;
    }
    public function _get_user_Additional()
    {
        $activities = UserActivities::where('user_id', '=', get_current_user_id())->get();
        return $activities;
    }
    public function _changeStatus(Request $request)
    {
        if ($request->type != 0) {
            $activities = new UserActivities;
            $activities->user_id = get_current_user_id();
            $activities->activity_id = $request->id;
            $activities->save();
        } else {
            $activities = UserActivities::where('activity_id', '=', $request->id)->where('user_id', '=', get_current_user_id())->first();
            $activities->delete();
        }
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
        $activitie = new AdditionalActivitie;
        $activitie->name = $request->name;
        $activitie->activitie_id = $request->main_id;
        $activitie->save();
        return redirect()->route('additionalactivitie.all');
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
        $activitie = AdditionalActivitie::find($id);
        return view('addItem.AdditionalActivitie.show', compact('activitie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $activitie = AdditionalActivitie::find($id);
        $mainActivitys = Activitie::all();
        return view('addItem.AdditionalActivitie.edit', compact('activitie', 'mainActivitys'));
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
        //
        $activitie = AdditionalActivitie::find($id);
        $activitie->name = $request->name;
        $activitie->activitie_id = $request->main_id;
        $activitie->save();
        return redirect()->route('additionalactivitie.all');
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
        $activitie = AdditionalActivitie::find($id);
        $activitie->delete();
        return redirect()->back();
    }
}
