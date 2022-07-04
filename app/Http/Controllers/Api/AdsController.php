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
            $ads['cover'] =  '/' . 'image' . '/' . getAdsCover($ads->id, 'Ads')->file;
            $ads['activity'] = getActivityById($ads->activitie_id)->name;
            $ads['city'] = getCityById($ads->city_id)->name;
            $ads['neighborhood'] = getNeighborhoodById($ads->neighborhood_id)->name;
            $ads['author'] = get_user_by_id($ads->user_id);
            $ads['authorName'] = get_user_by_id($ads->user_id)->name;
            $ads['infoArray'] = unserialize($ads->infoArray);
            $ads['from_date'] = time_elapsed_string($ads->created_at);
            $ads['quotes_count'] = get_ads_quotes_count($ads->id);
            $ads['Signed'] = get_Signed_ads($ads->id);
            if ($id == 5) {
                $ads['dealsOrAuction'] = $ads['infoArray']['dealsOrAuction'];
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
        $ads['cover'] = '/' . 'image' . '/' . getAdsCover($ads->id, 'Ads')->file;
        $ads['activity'] = getActivityById($ads->activitie_id)->name;
        $ads['city'] = getCityById($ads->city_id)->name;
        $ads['neighborhood'] = getNeighborhoodById($ads->neighborhood_id)->name;
        $ads['infoArray'] = unserialize($ads->infoArray);
        if (!empty(json_decode($ads->application_conditions))) {
            $ads['req_paper'] = explode(',', json_decode($ads->application_conditions)->Certificate[0]);
            $ads['req_paper'] = explode(',', json_decode($ads->application_conditions)->Certificate[0]);
            $ads['application_conditions'] = json_decode($ads->application_conditions);
        }
        $ads['author'] = get_user_by_id($ads->user_id);
        $ads['files'] = File::where('FK', $id)->where('model', 'Ads')->get();
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
