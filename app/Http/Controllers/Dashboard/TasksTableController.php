<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TasksTable;
use Illuminate\Http\Request;

class TasksTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tasks-table');
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
    public function _get_user_events()
    {
        $event = TasksTable::where('user_id', '=', get_current_user_id())->get();
        return  $event;
    }
    public function _addEvent(Request $request)
    {
        $event = new TasksTable;
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->className = $request->className;
        $event->description = $request->description;
        $event->user_id = get_current_user_id();
        $event->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Event added successfully'), 'type' => 'success'])->render(),
        ]);
    }
    public function _updateEvent(Request $request, $id)
    {
        $event = TasksTable::find($id);
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->className = $request->className;
        $event->description = $request->description;
        $event->user_id = get_current_user_id();
        $event->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Event updated successfully'), 'type' => 'success'])->render(),
        ]);
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
    public function edit($id)
    {
        //
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
