<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeEmployment;
use App\Models\TypeAds;
use App\Models\Ads;
use App\Models\Neighborhood;
use App\Models\Service;
use App\Models\File;
use App\Models\AdditionalActivitie;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getType($type,$id='')
    {
        
            $x = TypeAds::getTypeName($type);
            if ($id != '') {
            $item = Ads::find($id);
                $itemValue= unserialize($item->infoArray);
                return view('addItem.Ads.inputsAds',compact('x','type','itemValue','item') )->render();
            }
           
       return view('addItem.Ads.inputsAds',compact('x','type') )->render();
     
    }

    public function changeStatus($id,Request $request)
    {
     
            $x = Ads::find($id);
            $x->status = $request->status;
            $x->save();
            if ($x) {
           

                return $this->sendJson([
                    'status' => 1,
                    'message' => view('common.alert', ['message' => __('backend.status updated successfully'), 'type' => 'success'])->render(),
                    'reload' => true
                ]);
            }
    
            return $this->sendJson([
                'status' => 0,            
                'message' => view('common.alert', ['message' => __('backend.not chnge Status'), 'type' => 'danger'])->render(),
    
            ]);
     
    }

    public function getAddActivity($activity)
    {
        $item =AdditionalActivitie::where('activitie_id',$activity)->get();
        return $item;    
    }

    
    public function getServices($ADDactivity)
    {
        $item =Service::where('Addactivitie_id',$ADDactivity)->get();
        return $item;    
    }

    public function getNeighborhood($city)
    {
        $item =Neighborhood::where('city_id',$city)->get();
        return $item;    
    }

    public function deleteFile($id)
    {
        File::where('id',$id)->delete(); 
    }


    public function index()
    {
    
        if(is_admin())
        $Ads=Ads::orderBy('id', 'desc')->get();
       
        else
        $Ads=Ads::where('user_id',get_current_user_id())->orderBy('id', 'desc')->get();
        // dd( $Ads);
        return view('addItem.Ads.index',compact('Ads')); 
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('addItem.Ads.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $services=$this->getServices($request->activitie_Add_id);
        
    
        $x = TypeAds::getTypeName($request->model);
        $infoArray=[];
        foreach ($x[0] as $key => $value) {
         if ( $value['type'] != 'oo' && $request->exists($value['name']) ) {
             $infoArray += [$value['name'] => $request->get($value['name']) ];
         }
        }
        foreach ( $services as $key => $servicesvalue) {

            if (  $request->exists(str_replace(" ","_",$servicesvalue['name'])) ) {
                $infoArray += [$servicesvalue['name'] => 'on' ];
            }
           }
           $application_conditions=[];
           if (  $request->exists('Certificate','employment','Bank_guarantee','nots','Category_conditions') ) {
            $application_conditions=[
                'Certificate'=>$request->Certificate,
                'employment' =>$request->employment,
                'Bank_guarantee' =>$request->exists('Bank_guarantee')  ? 1 : 0,
                'nots' =>$request->nots,
                'Category_conditions' =>$request->exists('Category_conditions') ? 1 : 0,
            ];
        }

        $infoArray +=['model' => $request->model];
        $item=Ads::create(array_merge($request->all(), ['application_conditions' =>json_encode( $application_conditions) ]
        , ['infoArray' => serialize ($infoArray) ] , ['reference_number' => rand(10 * 45, 100 * 98)]));

        foreach ($request->file() as $key => $v) {
            foreach ($request->file($key) as $key => $value) {
                $this->fileUpload($value,'Ads', $item->id );
            }
        }

        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Your request has been successfully sent'), 'type' => 'success'])->render(),
            'redirect' => '/ads/ads'
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['item'] = Ads::with('activity','File')->find($id);
        return isset($data['item']) ? view('addItem.Ads.create', $data) : redirect()->back();

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
      
        $services=$this->getServices($request->activitie_Add_id);

        $x = TypeAds::getTypeName($request->model);
        $infoArray=[];
        foreach ($x[0] as $key => $value) {
         if ( $value['type'] != 'oo' && $request->exists($value['name']) ) {
             $infoArray += [$value['name'] => $request->get($value['name']) ];
              unset($request[$value['name']]);
         }
        }
        foreach ( $services as $key => $servicesvalue) {

            if (  $request->exists(str_replace(" ","_",$servicesvalue['name'])) ) {
                $infoArray += [$servicesvalue['name'] => 'on' ];
                 unset($request[str_replace(" ","_",$servicesvalue['name'])] );
            }
           
           }
        $infoArray +=['model' => $request->model];
        unset($request['model']);

        foreach ($request->file() as $key => $v) {
            $Adsfile = File::where('FK',$id)->where('model','Ads')->delete();
            foreach ($request->file($key) as $key => $value) {
                $this->fileUpload($value,'Ads', $id );
            }
        }
        $application_conditions=[];
     
        if (  $request->exists('Certificate','employment','Bank_guarantee','nots','Category_conditions') ) {
         $application_conditions=[
             'Certificate'=>$request->Certificate,
             'employment' =>$request->employment,
             'Bank_guarantee' =>$request->exists('Bank_guarantee')  ? 1 : 0,
             'nots' =>$request->nots,
             'Category_conditions' =>$request->exists('Category_conditions') ? 1 : 0,
         ];
     }

        $item=Ads::where('id', $id)->update(array_merge(
            $request->except(['upload_cont_img','upload_project_plans','upload_3D_files','upload_Specif_Quant','employment',
            'Certificate','Bank_guarantee','nots','Category_conditions',
        ]),
             ['application_conditions' =>json_encode( $application_conditions) ],
         ['infoArray' => serialize ($infoArray) ] , ['reference_number' => rand(10 * 45, 100 * 98)]));


        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Your request has been successfully sent'), 'type' => 'success'])->render(),
            'redirect' => '/ads/ads'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function delete($id)
    {
        $Ads = Ads::find($id);
        $Adsfile = File::where('FK',$id)->where('model','Ads')->delete();
        $Ads->delete();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Ads deleted successfully'), 'type' => 'success'])->render(),
            'reload' => true,
        ]);
    }
    
}
