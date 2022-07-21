<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\EmploymentApplications;
use Illuminate\Http\Request;

class EmploymentApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = '')
    {
        $employment = null;
        if (is_Facility() || is_admin()) {
            $employment = EmploymentApplications::where('to_id', '=', get_current_user_id());
        } else if (is_customer()) {
            $employment = EmploymentApplications::where('from_id', '=', get_current_user_id());
        }
        if ($filter) {
            $employment->where('status', '=', $filter);
        }
        $employment->orderBy('id', 'DESC');
        $employment = $employment->get();
        return view('Employment.index', compact('employment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymentApplications  $employmentApplications
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employment = EmploymentApplications::find($id);
        $employment['file'] = getEmploymentFile($id) == '' ? getfileByNameByUserId('cv', $employment->from_id)->file : getEmploymentFile($id);
        $employment['user'] = get_user_by_id($employment->from_id);
        $employment['ads'] = get_ads_by_id($employment->ads_id);
        $employment['user']['address'] = getUserAddressByNeighborhoo($employment['user']);
        $employment['owner'] = get_current_user_id() == $employment->from_id ? true : false;
        $employment['note'] =  $employment['note'] == null ? "لا يوجد ملاحظات ...." : $employment['note'];
        return $employment;
    }
    public function changeStatus($status, $id)
    {

        $Contract = EmploymentApplications::find($id);
        $Contract->status = $status;
        $Contract->save();
        return $this->sendJson([
            'message' => view('common.alert', ['message' => __('backend.Request status updated successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmploymentApplications  $employmentApplications
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentApplications $employmentApplications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmploymentApplications  $employmentApplications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentApplications $employmentApplications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymentApplications  $employmentApplications
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentApplications $employmentApplications)
    {
        //
    }
}
