<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DealsAuctions;
use App\Models\invoice;
use Illuminate\Http\Request;
use Redirect;

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
        if ($source == "received") {
            $DealsAuctions = DealsAuctions::where('to_id', '=', get_current_user_id());
        } else {
            $DealsAuctions = DealsAuctions::where('from_id', '=', get_current_user_id());
        }
        if ($filter) {
            $DealsAuctions->where('status', '=', $filter);
        }

        $DealsAuctions = $DealsAuctions->get();

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

    public function get_invoice($id)
    {
        
        $DealsAuctions = DealsAuctions::where('id', $id)->with('ads','inv','customer')->first();
        return    $DealsAuctions;
    }

    public function change_status($id,$status)
    {
   
        $DealsAuctions = DealsAuctions::where('id', $id)->update([
            'status' =>$status,
           ]);
           if ($DealsAuctions) {
            $this->sendJson([
                'status' => 1,
                'message' =>view('common.alert', ['message' => __('backend.accepted negotiate'), 'type' => 'success'])->render(),
                'reload' => true
            ], true);
        }

        $this->sendJson([
            'status' => 0,            
            'message' => view('common.alert', ['message' => __('backend.fields is required'), 'type' => 'danger'])->render(),

        ], true);
    }

    public function updateNegotiate(Request $request)
    {
      
       $DealsAuctions = DealsAuctions::where('id', $request->deals)->update([
        'price' =>$request->price,
        'status' =>'waiting',
       ]);
       
       return Redirect::back();

    }

    public function createInvoice(Request $request)
    {
    
        $DealsAuctions = DealsAuctions::where('id', $request->deals)->first();
        $invoice = invoice::create([
            'invoice_date' => date('Y-m-d H:i:s'),
            'supply_date' => $DealsAuctions->deals_date,
            'customer_name' => $DealsAuctions->customer->name,
            'address' =>  $DealsAuctions->customer->address,
            // 'invice_type' => $request->invice_type,
            // 'type' => $request->type,
            'TaxNumber' => $DealsAuctions->customer->Tax_Number,
            // 'responsible' => $request->responsible,
            'phone' => $DealsAuctions->customer->phone,
            'email' => $DealsAuctions->customer->email,
            // 'Banks' => serialize($request->bank),
            'user_id' => 20,
            'isDeals' => 1,
            // 'contracts_id' => $request->route('id') != null ? $request->route('id') : null,
        ]);

        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);

        $DealsAuctions->invoice_num = $invoice->id;
        $DealsAuctions->receipt_img = $filename;
        $DealsAuctions->status = 'done';
        $DealsAuctions->save();
    
        // if ($request->route('id') != null) {
        //     return redirect()->route('ElectronicContracts', ['source' => 'issued']);
        // }
        return redirect()->route('eBills');
    }

    public function show($id)
    {
            $invoice = invoice::find($id);
    
            $DealsAuctions = DealsAuctions::where('invoice_num',$id)->first();
            $discount = 0;
            $Taxable_amount = null;
            $tax_amount = null;
            $total = $DealsAuctions->price;
            $Ttotal = ['tax_amount' => $tax_amount, 'Taxable_amount' => $Taxable_amount, 'discount' => $discount, 'total' => $total];
        return view('Deals Auctions.Invoice-show', compact('invoice', 'DealsAuctions', 'Ttotal'));
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
