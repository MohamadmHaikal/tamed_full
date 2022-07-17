<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quote;


class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($source, $filter = '')
    {
        $quotes = null;
        if ($source == "received") {
            $quotes = Quote::where('to_id', '=', get_current_user_id());
        } else {
            $quotes = Quote::where('form_id', '=', get_current_user_id());
        }
        if ($filter) {
            $quotes->where('status', '=', $filter);
        }
        $quotes->orderBy('id', 'DESC');
        $quotes = $quotes->get();

        return view('Quotes.index', compact('quotes', 'source'));
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
        $quotes = Quote::find($id);
        $quotes['file'] = getQuotesFile($id);
        $quotes['user'] = get_user_by_id($quotes->form_id);
        $quotes['user']['address'] = getUserAddressByNeighborhoo($quotes['user']);
        $quotes['user']['project'] = get_user_projects($quotes->form_id)->count();
        $quotes['user']['customer'] = get_user_Customers_count($quotes->form_id);
        $quotes['owner'] = get_current_user_id()==$quotes->form_id? true : false; 
        return $quotes;
    }
    public function changeStatus($status, $id)
    {

        $Contract = Quote::find($id);
        $Contract->status = $status;
        $Contract->save();
        return $this->sendJson([
            'message' => view('common.alert', ['message' => __('backend.Request status updated successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
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
