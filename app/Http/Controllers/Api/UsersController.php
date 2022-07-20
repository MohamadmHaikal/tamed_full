<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\User;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function profile_details($id)
    {
        $user= User::find($id);
        $user->seenCount=($user->seenCount)+1;
        $user->save();
        $user['wallet_balance']='';
        $user['contract']=get_user_contract_count($id);
        $user['registration_date']=date('Y-m-d', strtotime( $user->created_at)); ;
        $user['Customers']=get_user_Customers_count($id);
        $user['activity']= getActivityById($user->activitie_id)->name;
        $user['city']= getCityById($user->city_id)->name;
        // $user['neighborhood']= getNeighborhoodById($user->neighbor_id)->name;
        $user['profile']=get_user_file_By_Name('profileFile',$id);
        $user['projects']=get_user_projects($id);
        return $user;
    }
    public function index($id)
    {
        
    }
    public function _getActivity($id)
    {
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
