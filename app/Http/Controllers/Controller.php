<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\File;
use Sentinel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendJson($data, $withDie = false)
    {
        if ($withDie) {
            echo json_encode($data);
            die;
        } else {
            return response()->json($data);
        }
    }
    public function getFolder()
    {
        $folder = 'customer';
        if (Sentinel::inRole('administrator')) {
            $folder = 'administrator';
        } elseif (Sentinel::inRole('partner')) {
            $folder = 'partner';
        }
        return $folder;
    }

    public function indexItem($model, $id = null)
    { 
        $modelName = 'App\\Models\\' .$model;
        $modelNew = new $modelName();
        if ($id != null) {
            $Item = $modelNew->where($modelNew->column,$id)->get();
            
        }else{ $Item = $modelNew->all();}
       
        return view('addItem.Item.index',  compact('Item' ,'model')); 
    }

    public function _deleteItem(Request $request)
    {
        $modelName = 'App\\Models\\' .$request->model;
        $model = new $modelName();
        $arrayItem = $model->where('id',$request->ID)->delete();

        if ($arrayItem) {
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

    public function _bulkActions(Request $request)
    {
    
        $action = request()->get('action', '');
        $post_id = request()->get('post_id', '');
      
        if (!empty($action) && !empty($post_id)) {
            $post_id = explode(',', $post_id);
            $modelName = 'App\\Models\\' .$request->model;
            $model = new $modelName();
            // $experienceModel = new Experience();
            switch ($action) {
                case 'delete':
                 
                    $model->whereIn('id', $post_id)->delete();
                    // $commentModel = new Comment();
                    // $commentModel->whereIn('post_id', $post_id)->where('post_type', 'experience')->delete();
                    // $termRelationModel = new TermRelation();
                    // $termRelationModel->whereIn('service_id', $post_id)->delete();
                    // $experiencePriceModel = new ExperiencePrice();
                    // $experiencePriceModel->whereIn('experience_id', $post_id)->delete();
                    // $experienceAvailabilityModel = new ExperienceAvailability();
                    // $experienceAvailabilityModel->whereIn('experience_id', $post_id)->delete();
                    break;
                case 'publish':
                case 'pending':
                case 'draft':
                case 'trash':
                    $experienceModel->updateMultiExperience([
                        'status' => $action
                    ], $post_id);
                    break;
            }
            $this->sendJson([
                'status' => 1,
                'title' => __('System Alert'),
                'message' => __('Bulk action successfully')
            ], true);
            
        }
        $this->sendJson([
            'status' => 0,
            'title' => __('System Alert'),
            'message' => __('Data invalid')
        ], true);
    }

    public function _addItem(Request $request)
    {
        
        $modelName = 'App\\Models\\' .$request->model;
        $model = new $modelName();
        $arrayItem = $model->create($request->all());

        if ($arrayItem) {
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

    public function _getItem(Request $request)
    {
    
        $modelName = 'App\\Models\\' .$request->model;
        $Newmodel = new $modelName();
        $arrayItem = $Newmodel->getColumn( $request->ID);
  
       return $this->sendJson([
           'title' =>  __('backend.'.$request->type),
           'type' =>   $request->type,
           'action' => ( $request->type == 'edit') ? '' : route('update-item') ,
           'model' => $request->model ,
           'arrayItem' => $arrayItem ,
        ], true);
    }

    public function _updateItem(Request $request)
    {
       
        $modelName = 'App\\Models\\' .$request->model;
        $model = new $modelName();
        $input = $request->all();
        $arrayItem = $model->findOrFail($request->id)->fill($input)->save();
        if ($arrayItem) {
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


    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    public function fileUpload( $value , $model ,$fk)
    {
 
        
        $size = $value->getSize();
        $size = $this->formatBytes($size, $precision = 2);
        $name = $value->getClientOriginalName();
        $type = $value->extension();
        $info = ['owner' => get_current_user_id(), 'size' => $size, 'type' => $type ];
        $info = serialize($info);
        $filename = time() . '.' . $value->getClientOriginalName();
        $value->move(public_path('image'), $filename);
        $file = new File;
        $file->name = $name;
        $file->info = $info;
        $file->model = $model;
        $file->FK = $fk;
        $file->file = $filename;
        $file->save();
    return $file->id;

        // return $this->sendJson([
        //     'status' => 1,
        //     'message' => view('Common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),
        //     'reload' => true,
        // ]);
    }

}
