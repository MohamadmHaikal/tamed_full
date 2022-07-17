<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function Send(Request $request)
    { 
        if($request->category=='project'){
            if (!$request->hasFile('file')) {
                return json_encode(['message'=>'ملف عرض السعر مطلوب !','code'=>'102'],true);
            }

        }
        else{
            if ($request->price==null && $request->type==null ){
                return json_encode(['message'=>'السعر المخصص مطلوب !','code'=>'102'],true);
            }

        }
        if($request->type!=null){
            $ads= get_ads_by_id($request->ads_id);
            $request->to_id= $ads->user_id;
            $request->title=$ads->title;
        }
        if($request->type=='with-cv' ){
            if(!$request->hasFile('file')){
               return json_encode(['message'=>'السيرة الذاتية مطلوبة !','code'=>'102'],true);  
            }
        }
        else{
            if(getfileByName('cv')==null){
                return json_encode(['message'=>'لا يوجد سيرة ذاتية مرفقة في ملفك الشخصي !','code'=>'102'],true);  
             }
        }
        $quotes = new Quote;
        $quotes->status = 'new';
        $quotes->form_id = $request->from_id;
        $quotes->to_id = $request->to_id;
        $quotes->ads_id = $request->ads_id;
        $quotes->note = $request->note;
        $quotes->price = $request->price;
        $quotes->name = $request->title;
        $quotes->save();
        if ($request->hasFile('file')) {
            
            $this->fileUpload(request()->file, 'quotes', $quotes->id);
        }
        return json_encode(['message'=>'تم ارسال الطلب بنجاح','code'=>'200'],true);
    }
}
