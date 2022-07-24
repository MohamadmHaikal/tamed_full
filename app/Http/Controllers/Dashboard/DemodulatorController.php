<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Demodulator;
use Illuminate\Http\Request;

class DemodulatorController extends Controller
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
        return view('Demodulator.create');
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
     * @param  \App\Models\Demodulator  $demodulator
     * @return \Illuminate\Http\Response
     */
    public function show(Demodulator $demodulator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demodulator  $demodulator
     * @return \Illuminate\Http\Response
     */
    public function edit(Demodulator $demodulator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demodulator  $demodulator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demodulator $demodulator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demodulator  $demodulator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demodulator $demodulator)
    {
        //
    }
}
