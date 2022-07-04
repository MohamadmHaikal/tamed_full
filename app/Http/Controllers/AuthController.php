<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;
use Sentinel;

class AuthController extends Controller
{

    public function _getLogin()
    {
        return view('dashboard.IndividualAuth.login');
    }
    public function Login()
    {
        return view('dashboard.loginSwitch');
    }

    public function _getSignUp()
    {
        return view('dashboard.IndividualAuth.sign-up');
    }
    public function _getResetPassword()
    {
        return view('dashboard.IndividualAuth.reset-password');
    }
    public function checkCardToReset(Request $request)
    {
        $user = User::where('IdCard', '=', $request->IdCard)->first();
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
    public function _getPostResetPassword(Request $request)
    {
        $user = User::where('IdCard', '=', $request->IdCard)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم تعيين كلمة المرور بنجاح'])->render()
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
        $user = User::where('IdCard', '=', $input['mobile'])->first();

        if (is_Facility($user->id)) {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => 'رقم الهوية / الاقامة المدخل غير مسجل بتعميد افراد'])->render()
            ]);
        }
        $code = mt_rand(1000, 9999);
        if (!empty($user)) {
            if($user->status=='InActive'){
                 return $this->sendJson([
                    'status' => 0,
                    'message' => view('common.alert', ['type' => 'danger', 'message' => 'الحساب غير نشط'])->render()
                ]);
                
            }
            if (Hash::check($input['password'], $user->password)) {
                $users = User::find($user['id']);
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
    public function CheckCode(Request $request)
    {
        $input = request()->only('IdCard', 'code');
        if (!$input['code']) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => __('كود التحقق مطلوب')])->render()
            ]);
        }
        $user = User::where('IdCard', '=', $input['IdCard'])->first();

        if ($user['v-code'] == $input['code']) {
            return $this->sendJson([
                'status' => 1,
                'user' => $user['id'],
                'message' => view('common.alert', ['type' => 'success', 'message' => __('backend....Logged in successfully. Redirecting')])->render()
            ]);
        } else {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => __('backend.The code is incorrect')])->render()
            ]);
        }
    }
    public function _getPostSignUp(Request $request)
    {
        $user = User::where('IdCard', '=', $request->IdCard)->orWhere('phone', $request->mobile)->first();
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
        $user = new User;
        $user->IdCard = $request->IdCard;
        $user->phone = $request->mobile;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user['v-code'] = $code;
        $user->save();
        $user = Sentinel::findById($user->id);
        $activation = Activation::create($user);
        $role = Sentinel::findRoleByName('Customer');
        $role->users()->attach($user);
        return $this->sendJson([
            'status' => 1,
            'mobile' => $user['phone'],
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم إرسال كود التحقق بنجاح'])->render()
        ]);
    }
    public function _postLogin(Request $request)
    {
        try {
            $user = Sentinel::findById($request['id']);
            Sentinel::login($user);
        } catch (ThrottlingException $e) {
        }
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['type' => 'success', 'message' => __('backend....Logged in successfully. Redirecting')])->render()
        ]);
    }
    public function _getLogout(Request $request)
    {
        $redirect_url = request()->get('redirect_url');

        Sentinel::logout();

        if (empty($redirect_url)) {
            $redirect_url = url('/login');
        }
        if (Auth::guard('mangers')->user()) {
            $redirect_url = url('Business/login');
        }
        return redirect($redirect_url);
    }
}
