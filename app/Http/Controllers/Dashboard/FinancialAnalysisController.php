<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\ElectronicContracts;
use App\Models\FinancialAnalysis;
use App\Models\invoice;
use App\Models\Products;
use Illuminate\Http\Request;

class FinancialAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $date = '')
    {
        if ($date == '') {
            $customerNumber = Customers::where('facility_id', '=', get_current_user_id())->count();
            $Rinvoices = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)->count();
            $Iinvoices = invoice::where('user_id', '=', get_current_user_id())->count();
            $Iinvoices = invoice::where('user_id', '=', get_current_user_id())->count();
            $Paidinvoices = invoice::where('user_id', '=', get_current_user_id())->where('status', '=', 'paid')->count();
            $UnPaidinvoices = invoice::where('user_id', '=', get_current_user_id())->where('status', '=', 'un paid')->count();
            $contract = ElectronicContracts::where('user_id', '=', get_current_user_id())->orwhere('SParty_id', get_current_user_id())->count();
            return view('Financial Analysis.index', compact('customerNumber', 'Rinvoices', 'Iinvoices', 'contract', 'Paidinvoices', 'UnPaidinvoices', 'date'));
        } else {
            $date = explode(" إلى ", $request->date);
            $customerNumber = Customers::where('facility_id', '=', get_current_user_id())->whereBetween('created_at', [$date[0], $date[1]])->count();
            $Rinvoices = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)->whereBetween('invoice_date', [$date[0], $date[1]])->count();
            $Iinvoices = invoice::where('user_id', '=', get_current_user_id())->whereBetween('invoice_date', [$date[0], $date[1]])->count();
            $Iinvoices = invoice::where('user_id', '=', get_current_user_id())->whereBetween('invoice_date', [$date[0], $date[1]])->count();
            $Paidinvoices = invoice::where('user_id', '=', get_current_user_id())->where('status', '=', 'paid')->whereBetween('invoice_date', [$date[0], $date[1]])->count();
            $UnPaidinvoices = invoice::where('user_id', '=', get_current_user_id())->where('status', '=', 'un paid')->whereBetween('invoice_date', [$date[0], $date[1]])->count();
            $contract = ElectronicContracts::where('user_id', '=', get_current_user_id())->orwhere('SParty_id', get_current_user_id())->get();
            $contract = $contract->whereBetween('created_at', [$date[0], $date[1]])->count();
            return view('Financial Analysis.index', compact('customerNumber', 'Rinvoices', 'Iinvoices', 'contract', 'Paidinvoices', 'UnPaidinvoices', 'date'));
        }
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
     * @param  \App\Models\FinancialAnalysis  $financialAnalysis
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialAnalysis $financialAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialAnalysis  $financialAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialAnalysis $financialAnalysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialAnalysis  $financialAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinancialAnalysis $financialAnalysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialAnalysis  $financialAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinancialAnalysis $financialAnalysis)
    {
        //
    }
}
