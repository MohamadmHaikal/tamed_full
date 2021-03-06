<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeEmployment;
use App\Models\TypeAds;
use App\Models\Ads;
use App\Models\Permit;
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
    public function uploadFile(Request $request){
            $file=[];
            foreach ($request->file($request->name) as $key => $value) {
                array_push($file, $this->fileUpload($value,'Ads', '0' ));
            }
        $all=File::whereIn('id',$file)->get();
        return[$file,$all];
    }
    
  public function removeFile(Request $request,$id)
  {  $a = [];
    array_push($a, $id);
    $arr = array_merge(array_diff(explode(',', $request->gallery), $a));
    $file = File::find($id);
    $file != null ? $file->delete() : '';
    return $arr;
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
        // if($request->salary!=null){
        //     $infoArray += ['salary' => $request->get('salary') ];
        // }
        foreach ( $services as $key => $servicesvalue) {

            if (  $request->exists(str_replace(" ","_",$servicesvalue['name'])) ) {
                $infoArray += [$servicesvalue['name'] => 'on' ];
            }
           }
           $application_conditions=[];
           foreach ($request->all() as $key => $v){
            $model = new Ads();
            if(!in_array($key, $model->getFillable())){
                $application_conditions+=[$key => $request->get($key)];
                unset($request[$key]);
            }
           
              }
           if (  $request->exists('Certificate','employment','PricingWithMaterials','CodeKSA','Building_Category','Building_Category_choices','Classification','Category_Category','Bank_guarantee','nots','Category_conditions') ) {
            $application_conditions=[
                'Certificate'=>$request->Certificate,
                'employment' =>$request->employment,
                'Bank_guarantee' =>$request->exists('Bank_guarantee')  ? 1 : 0,
                'nots' =>$request->nots,
                'Category_conditions' =>$request->exists('Category_conditions') ? 1 : 0,
                'PricingWithMaterials' =>$request->exists('PricingWithMaterials') ? 1 : 0,
                'CodeKSA' =>$request->exists('CodeKSA') ? 1 : 0,
                'Building_Category' =>$request->exists('Building_Category') ? 1 : 0,
                'Building_Category_choices' =>$request->exists('Building_Category_choices') ? 1 : 0,
                'Classification' =>$request->exists('Classification') ? 1 : 0,
                'Category_Category' =>$request->exists('Category_Category') ? 1 : 0,

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
    {  $ads=Ads::find($id);
       return  unserialize($ads->infoArray);
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
        $application_conditions=[];
        foreach ($request->all() as $key => $v){
            $model = new Ads();
            if(!in_array($key, $model->getFillable())){
                $application_conditions+=[$key => $request->get($key)];
                unset($request[$key]);
            }
           
              }
        foreach ($request->file() as $key => $v) {
            $Adsfile = File::where('FK',$id)->where('model','Ads')->delete();
            foreach ($request->file($key) as $key => $value) {
                $this->fileUpload($value,'Ads', $id );
            }
        }
   
     
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

    public function Permits()
    {
        if(is_admin())
        $Ads=Ads::orderBy('id', 'desc')->get();
       
        else
        $Ads=Ads::where('user_id',get_current_user_id())->orderBy('id', 'desc')->get();
        // dd( $Ads);
        return view('addItem.Ads.Permits',compact('Ads')); 
    }

    public function permitsShow($id)
    {
        $Permit=Permit::where('ads_id', $id)->orderBy('id', 'desc')->get();
        return view('addItem.Ads.permitsShow',compact('Permit')); 
    }

    public function permitsCreate(Request $request)
    {

        $Permit=Permit::create( $request->all());
        if($request->file!=null){
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $Permit->image = $filename;
        $Permit->save();
 
        }

        if ($Permit) {
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
    public function permit_get($id)
    {
        $Permit = Permit::where('id', $id)->first();

        return $Permit;
    }

    public function permit_status($id)
    {
       
        $Permit = Permit::where('id', $id)->first();
        if($Permit->status == 1) {
            $Permit->status = 0; 
        } else {
            $Permit->status = 1;
        }
        $Permit->save();
   
        if ($Permit) {
            $this->sendJson([
                    'status' => 1,
                    'message' =>view('common.alert', ['message' => __('backend.status updated successfully'), 'type' => 'success'])->render(),
                    'reload' => true
                ], true);
            }
    
             $this->sendJson([
                'status' => 0,            
                'message' => view('common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
    
            ], true);
       
    }

    public function permitsdelete($id)
    {
        $facility = Permit::where('id', $id)->delete();
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

    public function permit_update(Request $request,$id)
    {
      
        if($request->file != 'undefined'){
        
            $filename = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('image'), $filename);
            $Permit = Permit::where('id',$id)->update( array_merge(request()->except(['_token','file','refernce_num']), ['image' => $filename]));
            }else{
                $Permit = Permit::where('id',$id)->update( array_merge(request()->except(['_token','file','refernce_num'])));
            }
 

        if ($Permit) {
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
    
    
}
