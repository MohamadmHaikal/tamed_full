<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AuthManger;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Hash;
use Illuminate\Auth\AuthManager;
use Sentinel;

class AuthMangerController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/auth-manger';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.BusinessAuth.index');
    }
    public function _getLogin()
    {
        return view('dashboard.BusinessAuth.login');
    }
    public function _getSignUp()
    {
        return view('dashboard.BusinessAuth.sign-up');
    }
    public function _getResetPassword()
    {
        return view('dashboard.BusinessAuth.reset-password');
    }
    public function checkCardToReset(Request $request)
    {
        $user = AuthManger::where('IdCard', '=', $request->IdCard)->first();
        $code = mt_rand(1000, 9999);
        if (empty($user)) {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => 'الرقم المدخل غير موجود'])->render()
            ]);
        }
        $code = mt_rand(1000, 9999);
        $user['v-code'] = $code;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'mobile' => $user['phone'],
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم إرسال كود التحقق بنجاح'])->render()
        ]);
    }
    public function checkMobileUser(Request $request)
    {
        $input = request()->only('mobile', 'password');
        $validator = Validator::make(
            $request->all(),
            [
                'mobile' => 'required|numeric'
            ],
            [
                'mobile.required' => __('The mobile is required'),
                'mobile.exists' => __('The mobile does not exist'),

            ]
        );
        if ($validator->fails()) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => $validator->errors()->first()])->render()
            ]);
        }
        $user = AuthManger::where('IdCard', '=', $input['mobile'])->first();

        $code = mt_rand(1000, 9999);
        if (!empty($user)) {
            if (Hash::check($input['password'], $user->password)) {
                $users = AuthManger::find($user['id']);
                $users['v-code'] = $code;
                $users->save();
            } else {
                return $this->sendJson([
                    'status' => 0,
                    'message' => view('common.alert', ['type' => 'danger', 'message' => 'كلمة المرور المدخلة غير صحيحة'])->render()
                ]);
            }
        } else {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => 'الرقم المدخل غير موجود'])->render()
            ]);
        }
        return $this->sendJson([
            'status' => 1,
            'mobile' => $user['phone'],
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم إرسال كود التحقق بنجاح'])->render()
        ]);
    }
    public function _getPostSignUp(Request $request)
    {
        $user = AuthManger::where('IdCard', '=', $request->IdCard)->orWhere('phone', $request->mobile)->first();
        if ($user != null) {
            if ($user->IdCard == $request->IdCard) {
                return $this->sendJson([
                    'status' => 0,
                    'message' => view('common.alert', ['type' => 'danger', 'message' => __('رقم الهوية/الاقامة المدخل موجود بالفعل')])->render()
                ]);
            } else {
                return $this->sendJson([
                    'status' => 0,
                    'message' => view('common.alert', ['type' => 'danger', 'message' => __('رقم الجوال المدخل موجود بالفعل')])->render()
                ]);
            }
        }
        $code = mt_rand(1000, 9999);
        $user = new AuthManger;
        $user->IdCard = $request->IdCard;
        $user->phone = $request->mobile;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user['v-code'] = $code;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'mobile' => $user['phone'],
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم إرسال كود التحقق بنجاح'])->render()
        ]);
    }
    public function _getPostResetPassword(Request $request)
    {
        $user = AuthManger::where('IdCard', '=', $request->IdCard)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم تعيين كلمة المرور بنجاح'])->render()
        ]);
    }
    public function CheckCode(Request $request)
    {
        $input = request()->only('IdCard', 'code');
        if (!$input['code']) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => __('كود التحقق مطلوب')])->render()
            ]);
        }
        $user = AuthManger::where('IdCard', '=', $input['IdCard'])->first();

        if ($user['v-code'] == $input['code']) {
            return $this->sendJson([
                'status' => 1,
                'message' => view('common.alert', ['type' => 'success', 'message' => __('backend....Logged in successfully. Redirecting')])->render()
            ]);
        } else {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => __('backend.The code is incorrect')])->render()
            ]);
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        Sentinel::logout();
        return redirect()->route('Business.login');
    }
    public function _add_facility(Request $request)
    {
        $credentials = [
            'phone'    => request()->get('phone'),
            'password' => \Illuminate\Support\Str::random(12),
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $user_model = new \App\Models\User();
        $role = $user_model->getRoleByName('facility');
        $user_model->updateUserRole($user->getUserId(), $role->id);
        $current_manger_id = Auth::guard('mangers')->user()->id;
        $current_manger = AuthManger::find($current_manger_id);
        $facilities = unserialize($current_manger->facilities);
        if ($facilities == false) {
            $facilities = [];
        }
        array_push($facilities, $user['id']);
        $current_manger->facilities = serialize($facilities);
        $current_manger->save();
        $user = User::find($user['id']);
        $code = mt_rand(1000, 9999);
        $name = request()->get('name');
        $email = request()->get('email');
        $CRecord = request()->get('CRecord');
        $specialNumber = request()->get('specialNumber');
        $TaxNumber = request()->get('TaxNumber');
        $city = request()->get('city');
        $neighbor = request()->get('neighbor');
        $activitie_id = request()->get('activitie_id');
        $user->name = $name;
        $filename = time() . '.' . request()->logo->getClientOriginalExtension();
        request()->logo->move(public_path('image'), $filename);
        $user->logo = $filename;
        $user->email = $email;
        $user->TaxNumber = $TaxNumber;
        $user->specialNumber = $specialNumber;
        $user->CRecord = $CRecord;
        $user->verified = 1;
        $user->city_id = $city;
        $user->neighbor_id = $neighbor;
        $user->activitie_id = $activitie_id;
        $user['v-code'] = $code;
        $user['password'] = bcrypt($code);

        $user->save();
        return $this->sendJson([
            'status' => 1,
            'reload' => true,
            'message' => view('common.alert', ['message' => __('backend.Profile Updated successfully'), 'type' => 'success'])->render(),
        ]);
    }

    public function facil_login(Request $request)
    {
        try {
            $user = Sentinel::findById($request['id']);
            Sentinel::login($user);
        } catch (ThrottlingException $e) {
        }
        return redirect()->route('dashboard');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('mangers');
    }
}
