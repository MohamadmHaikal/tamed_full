<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\Ads;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $Ads = Ads::where('type', '=', $id)->where('status', '=', 1)->orderBy('id', 'desc')->limit(500)->paginate(5);
        foreach ($Ads as $ads) {

            $ads['created'] = date('d-m-Y', strtotime($ads->created_at));
            $ads['time'] = date('h:i', strtotime($ads->created_at));
            $ads['cover'] = get_ads_cover($ads->id) != null ? ('/' . 'image' . '/' . get_ads_cover($ads->id)) : 'https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png';
            $ads['activity'] = getActivityById($ads->activitie_id)->name;
            $ads['city'] = getCityById($ads->city_id)->name;
            // $ads['neighborhood'] = getNeighborhoodById($ads->neighborhood_id)->name;
            $ads['author'] = get_user_by_id($ads->user_id);
            $ads['authorName'] = get_user_by_id($ads->user_id)->name;
            $ads['infoArray'] = unserialize($ads->infoArray);
            $ads['from_date'] = time_elapsed_string($ads->created_at);
            $ads['quotes_count'] = get_ads_quotes_count($ads->id);
            $ads['Signed'] = get_Signed_ads($ads->id);
            if ($id == 5) {
                $ads['dealsOrAuction'] = $ads['infoArray']['dealsOrAuction'];
            }
            if ($ads->type == 6) {
                $ads['application_conditions'] = json_decode($ads->application_conditions);
                if ($ads['application_conditions'] != null) {
                    $ads['salary'] = number_format($ads['application_conditions']->salary);
                }
                 if (array_key_exists("residintal", $ads->application_conditions)) {
                $ads['residintal'] = __('backend.Valid residence');
            } else {
                $ads['residintal'] = '';
            }
            if ( isset($ads['application_conditions']->employment_on_warranty)) {
                $ads['employment_on_warranty'] = __('backend.on warranty');
            } else {
                $ads['employment_on_warranty'] = '';
            }
            if (isset($ads['application_conditions']->employment_rent_contract)) {
                $ads['employment_rent_contract'] = __('backend.rent contract');;
            } else {
                $ads['employment_rent_contract'] = '';
            }
            }
        }

        return $Ads;
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
        $ads = Ads::find($id);
        $ads->seenCount = ($ads->seenCount) + 1;
        $ads->save();
        $ads['created'] = date('d-m-Y', strtotime($ads->created_at));
        $ads['time'] = date('h:i', strtotime($ads->created_at));
        $ads['cover'] = get_ads_cover($ads->id) != null ? ('/' . 'image' . '/' . get_ads_cover($ads->id)) : 'https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png';
        $ads['activity'] = getActivityById($ads->activitie_id)->name;
        $ads['city'] = getCityById($ads->city_id)->name;
        // $ads['neighborhood'] = getNeighborhoodById($ads->neighborhood_id)->name;
        $ads['infoArray'] = unserialize($ads->infoArray);
        if (!empty(json_decode($ads->application_conditions))) {
            if ($ads->type != 6) {
                $ads['req_paper'] = explode(',', json_decode($ads->application_conditions)->Certificate[0]);
                $ads['req_paper'] = explode(',', json_decode($ads->application_conditions)->Certificate[0]);
            }
            $ads['application_conditions'] = json_decode($ads->application_conditions);
        }
        if ($ads->type == 6) {
            $ads['salary'] = number_format($ads['application_conditions']->salary);
           
            if (isset($ads['infoArray']['work_hours'])) {
                $ads['work_hours'] = $ads['infoArray']['work_hours'];
            }
            else{
                $ads['work_hours'] ='';
            }
            if (array_key_exists("residintal", $ads->application_conditions)) {
                $ads['residintal'] = __('backend.Valid residence');
            } else {
                $ads['residintal'] = '';
            }
            if (isset($ads->application_conditions->employment_on_warranty)) {
                $ads['employment_on_warranty'] = __('backend.on warranty');
            } else {
                $ads['employment_on_warranty'] = '';
            }
            if (isset($ads->application_conditions->employment_on_warranty)) {
                $ads['employment_rent_contract'] = __('backend.rent contract');;
            } else {
                $ads['employment_rent_contract'] = '';
            }
        }
        if(array_key_exists("Bank_guarantee", $ads->application_conditions)){
            $ads->application_conditions->Bank_guarantee='on';
        } 
        if(array_key_exists("CodeKSA", $ads->application_conditions)){
            $ads->application_conditions->CodeKSA='on';
        }
        if(array_key_exists("PricingWithMaterials", $ads->application_conditions)){
            $ads->application_conditions->PricingWithMaterials='on';
        }
        if(array_key_exists("conforming", $ads->application_conditions)){
            $ads->application_conditions->conforming='on';
        }
        $ads['author'] = get_user_by_id($ads->user_id);
        $gallery = $ads['gallery'] != null ? explode(',', $ads['gallery']) : [];
        $ads['files'] = File::whereIn('id', $gallery)->get();
        $specificationsFiles = $ads['specificationsFiles'] != null ? explode(',', $ads['specificationsFiles']) : [];
        $ads['specificationsFiles'] = File::whereIn('id', $specificationsFiles)->get();
        $ThreeDFiles = $ads['3D_Files'] != null ? explode(',', $ads['3D_Files']) : [];
        $ads['3D_Files'] = File::whereIn('id', $ThreeDFiles)->get();
        $planFiles = $ads['planFiles'] != null ? explode(',', $ads['planFiles']) : [];
        $ads['planFiles'] = File::whereIn('id', $planFiles)->get();
        foreach ($ads['files'] as $file) {
            $file['info'] = unserialize($file['info']);
        }
        return $ads;
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
