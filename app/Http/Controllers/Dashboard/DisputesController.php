<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DisputesMessage;
use App\Models\Report;
use Illuminate\Http\Request;

use function React\Promise\reduce;

class DisputesController extends Controller
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
                $reports = Report::where('status', '=', $filter)->get();
            } else {
                $reports = Report::all();
            }
        } else {
            if ($filter) {
                $reports = Report::where('applicant_id', get_current_user_id())
                    ->orWhere('against_id', get_current_user_id())
                    ->where('status', '=', $filter)
                    ->get();
            } else {
                $reports = Report::where('applicant_id', get_current_user_id())
                    ->orWhere('against_id', get_current_user_id())
                    ->get();
            }
        }

        return view('Disputes.index', compact('reports', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Disputes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report;
        $report->title = $request->title;
        $report->description = $request->description;
        $report->status = 'active';
        $report->against_id = $request->customer;
        $report->type = $request->type;
        $report->applicant_id = get_current_user_id();
        $report->ref_number = time() . rand(10 * 45, 100 * 98);
        $report->save();
        return redirect()->route('Disputes.show', ['id' => $report->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        $message = DisputesMessage::where('reports_id', '=', $id)->get();
        return view('Disputes.show', compact('report', 'message'));
    }

    public function _show_message($id)
    {
        return DisputesMessage::find($id);
    }
    public function close_dispute($id)
    {
        $report = Report::find($id);
        $report->status = 'closed';
        $report->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Complaint closed successfully'), 'type' => 'success'])->render(),
            'reload' => true,
        ]);
    }
    public function addComent(Request $request, $id)
    {      if($request->message==null){
                $message['status'] = view('common.alert', ['message' => __('backend.Message text is required'), 'type' => 'danger'])->render();
                $message['statu']=0;
                return $message;
                
                
            }
        $message = new DisputesMessage;
        $message->user_id = get_current_user_id();
        $message->message = $request->message;
        $message->reports_id = $id;

        if (request()->file()) {
            $filename = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('image'), $filename);
            $message->image = $filename;
        }
        $message->save();
        $message->date = date('Y-m-d', strtotime($message->created_at));
        $message->user_id = get_user_by_id($message->user_id)->name;
        $message['statu']=1;
        $message['status'] = view('common.alert', ['message' => __('backend.message added successfully'), 'type' => 'success'])->render();
        return $message;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    public function _update_message(Request $request, $id)
    {
        $message = DisputesMessage::find($id);
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
