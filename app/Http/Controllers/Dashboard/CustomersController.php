<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::where('customer_id', '=', get_current_user_id())->orwhere('facility_id', '=', get_current_user_id())->get();
        return view('Facility Customers.index', compact('customers'));
    }

    public function customer_get($id)
    {
        $facility = User::where('CRecord', $id)->first();
        return $facility;
    }

    public function customer_delete($id)
    {
       
        $facility = Customers::where('id', $id)->delete();
        if ($facility) {
        $this->sendJson([
                'status' => 1,
                'message' =>view('common.alert', ['message' => __('backend.successfully'), 'type' => 'success'])->render(),
                'reload' => true
            ], true);
        }

         $this->sendJson([
            'status' => 0,            
            'message' => view('common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),

        ], true);

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
        
        // $date=[
        //     'customer_id' =>get_current_user_id(),
        //     'facility_id' =>get_current_user_id(),
        // ];
        $customers = Customers::create($request->all());
        if ($customers) {
            $this->sendJson([
                'status' => 1,
                'message' =>view('common.alert', ['message' => __('backend.create successfully'), 'type' => 'success'])->render(),
                'reload' => true
            ], true);
        }

        $this->sendJson([
            'status' => 0,            
            'message' => view('common.alert', ['message' => __('backend.fields is required'), 'type' => 'danger'])->render(),

        ], true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Customers::where('id', $id)->first();
        return  $facility;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function customer_update(Request $request,$id)
    {
         $date=[
          'facility_id' => $request->facility_id,
          'customer_id' => $request->customer_id,
          'facility_name' => $request->facility_name,
          'responsible' => $request->responsible,
          'phone' => $request->phone,
          'note' => $request->note,
        ];
        $customers = Customers::where('id',$id)->update($date);
        if ($customers) {
            $this->sendJson([
                'status' => 1,
                'message' =>view('common.alert', ['message' => __('backend.update successfully'), 'type' => 'success'])->render(),
                'reload' => true
            ], true);
        }

        $this->sendJson([
            'status' => 0,            
            'message' => view('common.alert', ['message' => __('backend.fields is required'), 'type' => 'danger'])->render(),

        ], true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }
}
