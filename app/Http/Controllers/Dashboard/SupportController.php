<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Support;
use App\Models\SupportMessages;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = '')
    {
      $reports = null;
        if (is_admin()) {
            if ($filter) {
                $reports = Support::where('status', '=', $filter)->get();
            } else {
                $reports = Support::all();
            }
        } else {
            if ($filter) {
                $reports = Support::where('user_id', get_current_user_id())
                    ->where('status', '=', $filter)
                    ->get();
            } else {
                $reports = Support::where('user_id', get_current_user_id())->get();
            }
        }

        return view('Support.index', compact('reports', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $support = new Support;
        $support->title = $request->title;
        $support->description = $request->description;
        $support->status = 'active';
        $support->type = $request->type;
        $support->user_id = get_current_user_id();
        $support->ref_number = time() . rand(10 * 45, 100 * 98);
        $support->save();
        return redirect()->route('Support.show', ['id' => $support->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Support::find($id);
        $message = SupportMessages::where('support_id', '=', $id)->get();
        return view('Support.show', compact('report', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        
    }
    
    public function addComent(Request $request, $id)
        {if($request->message==null){
                $message['status'] = view('common.alert', ['message' => __('backend.Message text is required'), 'type' => 'danger'])->render();
                $message['statu']=0;
                return $message;
                
                
            }
            $message = new SupportMessages;
            $message->user_id = get_current_user_id();
            $message->message = $request->message;
            $message->support_id = $id;
    
            if (request()->file()) {
                $filename = time() . '.' . request()->file->getClientOriginalExtension();
                request()->file->move(public_path('image'), $filename);
                $message->image = $filename;
            }
            $message->save();
            $message->date = date('Y-m-d', strtotime($message->created_at));
            $message->user_id = get_user_by_id($message->user_id)->name;
            $message['status'] = view('common.alert', ['message' => __('backend.message added successfully'), 'type' => 'success'])->render();
           $message['statu']=1;
            return $message;
        }
         public function _show_message($id)
    {
        return SupportMessages::find($id);
    }
public function _update_message(Request $request, $id)
    {
        $message = SupportMessages::find($id);
        $message->message = $request->message_content;
        if (request()->file()) {
            $filename = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('image'), $filename);
            $message->image = $filename;
        }
        $message->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.message updated successfully'), 'type' => 'success'])->render(),
            'reload' => true,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }
}
