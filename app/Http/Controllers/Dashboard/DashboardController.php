<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\File;
use App\Models\User;
use App\Models\UserProjects;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerNumber = Customers::where('facility_id', '=', get_current_user_id())->count();

        return view('dashboard.dashboard',compact('customerNumber'));
    }
    public function _getProfile()
    {
        return view('dashboard.profile-edit');
    }
    public function _updateYourAvatar(Request $request)
    {
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $user = User::find(get_current_user_id());
        $user->logo = $filename;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
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
    public function _updateYourProfileFile(Request $request)
    {
        $size = $request->file('file')->getSize();
        $size = $this->formatBytes($size, $precision = 2);
        $name = $request->file('file')->getClientOriginalName();
        $type = $request->file('file')->extension();
        $modal = ['owner' => get_current_user_id(), 'size' => $size, 'type' => $type, 'section' => 'profile'];
        $modal = serialize($modal);
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $file = new File;
        $file->name = $name;
        $file->modal = $modal;
        $file->file = $filename;
        $file->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
    }
    public function _uploadFile(Request $request)
    {
        $file = File::where('model', '=', $request->type)->where('FK', '=', get_current_user_id())->first();
        if ($file != null) {
            $file->delete();
        }
        $this->fileUpload(request()->file, $request->type, get_current_user_id());
        return $this->sendJson([
            'status' => 1,
            'file' => getfileByName($request->type),
            'message' => view('common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
    }
    public function _showProject($id)
    {
        return UserProjects::find($id);
    }
    public function _deleteYourProject($id)
    {
        UserProjects::find($id)->delete();
        return redirect()->back();
    }
    public function _editProject(Request $request, $id)
    {
        UserProjects::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'author' => get_current_user_id()
        ]);
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.project updated successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }
    public function _addYourProject(Request $request)
    {
        UserProjects::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'author' => get_current_user_id()
        ]);
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.project added successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }
    public function _updateYourProfile(Request $request)
    {
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $CRecord = request()->get('CRecord');
        $specialNumber = request()->get('specialNumber');
        $TaxNumber = request()->get('TaxNumber');
        $description = request()->get('description');
        $city = request()->get('city');
        $neighbor = request()->get('neighbor');
        $activitie_id = request()->get('activitie_id');
        $user = User::find(get_current_user_id());
        $user->name = $name;
        $user->phone = $phone;
        $user->email = $email;
        $user->TaxNumber = $TaxNumber;
        $user->specialNumber = $specialNumber;
        $user->CRecord = $CRecord;
        $user->verified = 1;
        $user->description = $description;
        $user->city_id = $city;
        $user->neighbor_id = $neighbor;
        $user->activitie_id = $activitie_id;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Profile Updated successfully'), 'type' => 'success'])->render(),

        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
