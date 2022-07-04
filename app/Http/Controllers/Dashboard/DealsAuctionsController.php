<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DealsAuctions;
use Illuminate\Http\Request;

class DealsAuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($source, $filter = '')
    {
        $DealsAuctions = null;
        // if ($source == "received") {
        //     $DealsAuctions = DealsAuctions::where('to_id', '=', get_current_user_id());
        // } else {
        //     $DealsAuctions = DealsAuctions::where('form_id', '=', get_current_user_id());
        // }
        // if ($filter) {
        //     $DealsAuctions->where('status', '=', $filter);
        // }

        // $DealsAuctions = $DealsAuctions->get();

        return view('Deals Auctions.index', compact('DealsAuctions','source'));
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
     * @param  \App\Models\DealsAuctions  $dealsAuctions
     * @return \Illuminate\Http\Response
     */
    public function show(DealsAuctions $dealsAuctions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DealsAuctions  $dealsAuctions
     * @return \Illuminate\Http\Response
     */
    public function edit(DealsAuctions $dealsAuctions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DealsAuctions  $dealsAuctions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DealsAuctions $dealsAuctions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DealsAuctions  $dealsAuctions
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealsAuctions $dealsAuctions)
    {
        //
    }
}
