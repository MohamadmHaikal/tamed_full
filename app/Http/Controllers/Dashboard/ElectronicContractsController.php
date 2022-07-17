<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ElectronicContracts;
use App\Models\File;
use App\Models\invoice;
use App\Models\Quote;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class ElectronicContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($source, $filter = '')
    {
        $Contracts = null;
        if ($source == "received") {
            $Contracts = ElectronicContracts::where('SParty_id', '=', get_current_user_id());
        } else {
            $Contracts = ElectronicContracts::where('user_id', '=', get_current_user_id());
        }
        if ($filter) {
            $Contracts->where('status', '=', $filter);
        }

        $Contracts = $Contracts->get();

        return view('ElectronicContracts.index', compact('Contracts', 'source'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $types = UserType::all();
        return view('ElectronicContracts.create', compact('cities', 'types'));
    }
    public function checkUser($CRecord = '')
    {
        $user = User::where('CRecord', '=', $CRecord)->first();
        if (get_current_user_data()->CRecord == $CRecord) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['message' => __('backend.The entered commercial register is the number of your current establishments'), 'type' => 'danger'])->render(),

            ]);
        }
        if ($user) {
            $userType = get_facility_type($user->type_id);
            return $this->sendJson([
                'status' => 1,
                'message' => view('common.alert', ['message' => __('backend.Commercial Registration Verified Successfully'), 'type' => 'success'])->render(),
                'user' => $user,
                'userType' => $userType
            ]);
        }
        return $this->sendJson([
            'status' => 0,
            'message' => view('common.alert', ['message' => __('backend.The commercial register entered does not exist'), 'type' => 'danger'])->render(),

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
        $batch = [];
        for ($i = 1; $i <= count($request->batch); $i++) {
            if ($request->batch[$i] != null) {
                array_push($batch, $request->batch[$i]);
            }
        }

        $Contract = new ElectronicContracts;
        $Contract->CRecord = get_user_by_id($request->customer)->CRecord;
        $Contract->contract_number = $request->contract_number;
        $Contract->responsible = $request->responsible;
        $Contract->phone = $request->phone;
        $Contract->adjective = $request->adjective;
        $Contract->Brief_description = $request->Brief_description;
        $Contract->contract_date = $request->contract_date;
        $Contract->date_start = $request->date_start;
        $Contract->date_end = $request->date_end;
        $Contract->renewable = $request->renewable;
        $Contract->Payment_system = $request->Payment_system;
        $Contract->amount = $request->amount;
        $Contract->user_id = get_current_user_id();
        $Contract->SParty_id = $request->customer;
        $Contract->status = 'waiting';
        $Contract->batch = serialize($batch);
        $Contract->final_batch = $request->final_batch;
        $Contract->city_id = $request->city_id;
        $Contract->description = $request->description;
        $Contract->Contract_file = '22';
        $Contract->ads_id = $request->ads_id;
        $Contract->save();
        if ($request->ads_id != null) {
            $Contract = Quote::find($request->quotes_id);
            $Contract->status = 'accepted';
            $Contract->save();
        }
        $this->fileUpload($request->file('Contract_file'), 'ElectronicContracts', $Contract->id);
        return redirect()->route('ElectronicContracts', ['source' => 'issued']);
    }
    public function changeStatus($status, $id)
    {

        $Contract = ElectronicContracts::find($id);
        $Contract->status = $status;
        $Contract->save();
        return $this->sendJson([

            'reload' => true
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
        $Contract = ElectronicContracts::find($id);
        $Contract['type'] = get_facility_type(get_user_by_id($Contract->SParty_id)->type_id);
        $Contract['City'] = $Contract->City->name;
        $Contract['company_name'] = get_user_by_id($Contract->SParty_id)->name;
        $Contract['is_received'] = get_current_user_id() == $Contract->SParty_id ? true : false;
        $Contract['batch'] = unserialize($Contract->batch);
        $Contract['Contract_file'] = File::where('FK', '=', $Contract->id)->where('model', '=', 'ElectronicContracts')->first()->file;

        return $Contract;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $Contract = ElectronicContracts::find($id);
        $user = User::where('CRecord', '=', $Contract->CRecord)->first();
        $Contract['batch'] = unserialize($Contract->batch);
        $Contract['userType'] = get_facility_type($user->type_id);
        $Contract['Company_name'] = $user->name;
        return view('ElectronicContracts.edit', compact('cities', 'Contract'));
    }
    public function _getInvoice($id)
    {
        return invoice::where('contracts_id', '=', $id)->get();
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
        $batch = [];
        for ($i = 1; $i <= count($request->batch); $i++) {
            if ($request->batch[$i] != null) {
                array_push($batch, $request->batch[$i]);
            }
        }
        $Contract = ElectronicContracts::find($id);
        $Contract->CRecord = get_user_by_id($request->customer)->CRecord;
        $Contract->contract_number = $request->contract_number;
        $Contract->Brief_description = $request->Brief_description;
        $Contract->contract_date = $request->contract_date;
        $Contract->date_start = $request->date_start;
        $Contract->date_end = $request->date_end;
        $Contract->adjective = $request->adjective;
        $Contract->renewable = $request->renewable;
        $Contract->Payment_system = $request->Payment_system;
        $Contract->amount = $request->amount;
        $Contract->user_id = get_current_user_id();
        $Contract->SParty_id = $request->customer;
        $Contract->batch = serialize($batch);
        $Contract->final_batch = $request->final_batch;
        $Contract->city_id = $request->city_id;
        $Contract->description = $request->description;
        $Contract->save();
        if ($request->file('Contract_file')) {
            File::where('FK', '=', $Contract->id)->where('model', '=', 'ElectronicContracts')->first()->delete();
            $this->fileUpload($request->file('Contract_file'), 'ElectronicContracts', $Contract->id);
        }
        return redirect()->route('ElectronicContracts', ['source' => 'issued']);
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
