<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activitie::all();
        $userType = UserType::all();
        return view('addItem.Activities.index', compact('activities', 'userType'));
    }
    public function _getActivity($id)
    {
        $activities = Activitie::where('type_id', '=', $id)->get();
        return $activities;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $userType = UserType::all();
        return view('addItem.Activities.create', compact('userType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',

            ],
            [
                'name.required' => __('First name is required'),

            ]
        );
        if ($validator->fails()) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
            ]);
        }
        $activitie = new Activitie;
        $activitie->activity = $request->name;
        $activitie->type_id = $request->type_id;
        $activitie->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Activity added successfully'), 'type' => 'success'])->render(),
            'reload' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $activitie = Activitie::find($id);
        return view('addItem.Activities.show', compact('activitie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activitie = Activitie::find($id);
        $userType = UserType::all();
        return view('addItem.Activities.edit', compact('activitie', 'userType'));
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
        $activitie = Activitie::find($id);
        $activitie->activity = $request->name;
        $activitie->type_id = $request->type_id;
        $activitie->save();
        return redirect()->route('activites.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activitie = Activitie::find($id);
        $activitie->delete();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Activity deleted successfully'), 'type' => 'success'])->render(),
            'reload' => true,
        ]);
    }
}
