<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccounts;
use App\Models\invoice;
use App\Models\Products;
use App\Models\subscription;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class eBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($source = '')
    {
        $invoices = null;
        if ($source == "received") {
            $invoices = invoice::where('TaxNumber', '=', get_current_user_data()->TaxNumber)->get();
        } else if ($source == "issued") {
            $invoices = invoice::where('user_id', '=', get_current_user_id())->get();
        } else if ($source == "Unpaid") {
            $invoices = invoice::where('user_id', '=', get_current_user_id())->where('status', '=', 'un paid')->get();
        } else {
            $invoices = invoice::where('user_id', '=', get_current_user_id())->orWhere('TaxNumber', '=', get_current_user_data()->TaxNumber)->get();
        }
        $date = subscription::where('user_id', '=', get_current_user_id())->first();
        if ($date != null) {
            $date = $date->end_date;
        }
        if ($date == null || strtotime("now") > strtotime($date)) {
            return view('eBills.Invoice-dashboard', compact('invoices', 'date'));
        }
        return view('eBills.index', compact('invoices', 'date'));
    }
    public function _updateInvoiceLogo(Request $request)
    {
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $user = User::find(get_current_user_id());
        $user->invoiceLogo = $filename;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
    }
    public function _do_subscribe()
    {
        $dateNow = new DateTime('now');
        $dateNow->modify('+3 month');
        $subs = subscription::where('user_id', '=', get_current_user_id())->first();
        $subscription = new subscription;
        $subscription->start_date = new DateTime('now');
        $subscription->end_date = $dateNow;
        $subscription->user_id = get_current_user_id();
        if ($subs != null) {
            $subs->delete();
        }
        $subscription->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Subscribed successfully'), 'type' => 'success'])->render(),

        ]);
    }
    public function _updateInvoiceSignature(Request $request)
    {
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $user = User::find(get_current_user_id());
        $user->Signature = $filename;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = BankAccounts::where('user_id', '=', get_current_user_id())->get();
        return view('eBills.create', compact('banks'));
    }
    public function subscribe()
    {
        return view('eBills.subscribe');
    }
    public function _InvoiceSettings()
    {
        return view('eBills.Invoice-Settings');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $invoice = invoice::create([
            'invoice_date' => $request->Invoice_date,
            'supply_date' => $request->date_supply,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'invice_type' => $request->invice_type,
            'type' => $request->type,
            'TaxNumber' => $request->Tax_Number,
            'responsible' => $request->responsible,
            'phone' => $request->phone,
            'email' => $request->email,
            'Banks' => serialize($request->bank),
            'user_id' => get_current_user_id(),
            'contracts_id' => $request->route('id') != null ? $request->route('id') : null,
            'isBrief'=> $request->type_type=='short invoice'? '1' :null,
        ]);
        if($request->invice_type=='Tax bill' && $request->type_type=='short invoice'){
            $tax_amount = ((($request->Tax['1']) / 100) * ($request->Total));
            $Taxable_amount = null;
            if ($request->DiscountType == 1) {
                $Taxable_amount =   ($request->Total) - $request->discountValue;
            } else if ($request->DiscountType == 2) {
                $Taxable_amount =($request->Total)-( (($request->Total)*($request->discountValue))/100) ;
            }
            $total = $Taxable_amount + $tax_amount;
            Products::create([
                'name' => $request->note,
                'quantity' => '1',
                'value' => $request->Total,
                'discount' => $request->discountValue,
                'discount_type' => $request->DiscountType,
                'Taxable_amount' => $Taxable_amount,
                'tax_rate' => $request->Tax['1'],
                'tax_amount' => $tax_amount,
                'invoices_id' => $invoice->id,
                'total' => $total,
            ]);
        }
        else{
        $card = $request->product_name;
        for ($i = 1; $i <= count($card); $i++) {
            if (!empty($card[$i])) {
                $Taxable_amount = null;
                if ($request->Discount_type[$i] == 1) {
                    $Taxable_amount = ($request->Quantity[$i]) * ($request->Price[$i]) - $request->Discount[$i];
                } else if ($request->Discount_type[$i] == 2) {
                    $Taxable_amount = (($request->Quantity[$i]) * ($request->Price[$i])) - ((($request->Discount[$i]) / 100) * (($request->Quantity[$i]) * ($request->Price[$i])));
                }
                $tax_amount = ((($request->Tax[$i]) / 100) * ($Taxable_amount));
                $total = $Taxable_amount + $tax_amount;
                Products::create([
                    'name' => $request->product_name[$i],
                    'quantity' => $request->Quantity[$i],
                    'value' => $request->Price[$i],
                    'discount' => $request->Discount[$i],
                    'discount_type' => $request->Discount_type[$i],
                    'Taxable_amount' => $Taxable_amount,
                    'tax_rate' => $request->Tax[$i],
                    'tax_amount' => $tax_amount,
                    'invoices_id' => $invoice->id,
                    'total' => $total,
                ]);
            }
        }
        }
        if ($request->route('id') != null) {
            return redirect()->route('ElectronicContracts', ['source' => 'issued']);
        }
        return redirect()->route('eBills');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = invoice::find($id);
        $products = Products::where('invoices_id', '=', $id)->get();
        $Ttotal = null;
        $discount = null;
        $Taxable_amount = null;
        $tax_amount = null;
        $total = null;
        foreach ($products as $product) {
            $discount += (($product->value) * ($product->quantity)) - $product->Taxable_amount;
            $Taxable_amount += $product->Taxable_amount;
            $tax_amount += $product->tax_amount;
            $total += $product->total;
        }
        $Ttotal = ['tax_amount' => $tax_amount, 'Taxable_amount' => $Taxable_amount, 'discount' => $discount, 'total' => $total];
        $banks = BankAccounts::whereIn('id', unserialize($invoice->Banks))->get();
        return view('eBills.Invoice-show', compact('invoice', 'products', 'Ttotal', 'banks'));
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
    public function _search(Request $request)
    {
        $date = explode(" إلى ", $request->date);
        if ($request->date == null) {
            return redirect()->back();
        }
        $invoices = invoice::where('user_id', '=', get_current_user_id())->orWhere('TaxNumber', '=', get_current_user_data()->TaxNumber)->get();
        $invoices = $invoices->whereBetween('invoice_date', [$date[0], $date[1]]);
        $date = subscription::where('user_id', '=', get_current_user_id())->first();
        if ($date != null) {
            $date = $date->end_date;
        }
        if ($date == null || strtotime("now") > strtotime($date)) {
            return view('eBills.Invoice-dashboard', compact('invoices', 'date'));
        }
        return view('eBills.index', compact('invoices', 'date'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function _changeStatus($status, $id)
    {
        $invoice = invoice::find($id);
        $invoice->status = $status;
        $invoice->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
}
