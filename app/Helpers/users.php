<?php

use App\Models\ChMessage;
use App\Models\Neighborhood;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserProjects;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Mockery\Exception;
use Illuminate\Support\Facades\Http;
use App\Models\Customers;
use App\Models\ElectronicContracts;


function get_all_roles()
{
    $user_model = new \App\Models\User();
    $users = $user_model->getAllRoles();
    if ($users) {
        $data = [];
        foreach ($users as $user) {
            $data[$user->id] = $user->name;
        }

        return $data;
    }
    return [];
}

function get_user_role($user_id, $type = '')
{
    $user_model = new \App\Models\User();
    $result = $user_model->getUserRole($user_id);
    if (!empty($type)) {
        return isset($result->$type) ? $result->$type : '';
    }
    return $result;
}



function logout_url($redirect = '')
{
    if (!$redirect) {
        $redirect = url('/');
    }
    return auth_url('logout') . '/?redirect_url=' . $redirect;
}

function is_user_logged_in()
{
    $userdata = get_current_user_data();
    return !empty($userdata) ? true : false;
}
function get_current_manger_faci()
{
    $facilities = [];
    if (Auth::guard('mangers')->user()->facilities != null) {
        $facilities = unserialize(Auth::guard('mangers')->user()->facilities);
    }

    return User::whereIn('id', $facilities)->get();
}


function get_current_user_id()
{
    $user_data = get_current_user_data();

    if ($user_data != null) {
        return $user_data->getUserId();
    } else {
        return 0;
    }
}
function get_current_user_name()
{
    $user_data = get_current_user_data();

    if ($user_data != null) {
        return $user_data->name;
    } else {
        return 0;
    }
}
function get_current_user_projects()
{
    $projects = UserProjects::where('author', '=', get_current_user_id())->get();
    return $projects;
}
function get_user_Customers_count($id)
{
   $customerNumber = Customers::where('facility_id', '=', $id)->count();
   return $customerNumber;
}
function get_user_contract_count($id)
{
    $contract = ElectronicContracts::where('user_id', '=',$id)->orwhere('SParty_id', $id)->count();

   return $contract;
}

function get_user_projects($id)
{
    $projects = UserProjects::where('author', '=', $id)->get();
    return $projects;
}
function get_current_user_message_count()
{
    return ChMessage::where('to_id', '=', get_current_user_id())->where('seen', '=', 0)->count();
}
function get_current_user_header_notification()
{
    return Notification::where('user_to', '=', get_current_user_id())->take(4)->orderBy('ID', 'DESC')->get();
}
function get_current_user_notification_count()
{
    return Notification::where('user_to', '=', get_current_user_id())->where('seen', '=', 0)->count();
}
function get_faci_notification_count($id)
{
    return Notification::where('user_to', '=', $id)->where('seen', '=', 0)->count();
}
function get_faci_message_count($id)
{
    return ChMessage::where('to_id', '=', $id)->where('seen', '=', 0)->count();
}
function is_admin($user_id = '')
{
    if (!$user_id) {
        $user_id = get_current_user_id();
    }
    $user_data = get_user_by_id($user_id);

    if ($user_data) {
        return $user_data->inRole('administrator') ? true : false;
    }
    return false;
}

function is_partner($user_id = '')
{
    if (!$user_id) {
        $user_id = get_current_user_id();
    }
    $user_data = get_user_by_id($user_id);

    if ($user_data) {
        return $user_data->inRole('partner') ? true : false;
    }
    return false;
}
function is_Facility($user_id = '')
{
    if (!$user_id) {
        $user_id = get_current_user_id();
    }
    $user_data = get_user_by_id($user_id);

    if ($user_data) {
      
        return $user_data->inRole('facility') ? true : false;
    }
    return false;
}
function is_customer($user_id = '')
{
    if (!$user_id) {
        $user_id = get_current_user_id();
    }
    $user_data = get_user_by_id($user_id);

    if ($user_data) {
        return $user_data->inRole('customer') ? true : false;
    }
    return false;
}

function get_current_user_data()
{
    return Sentinel::getUser();
}
function get_location_by_id($id)
{
    $neighbor = Neighborhood::find($id);
    return $neighbor->relation->name . ' , ' . $neighbor->name;
}
function get_user_by_id($user_id)
{
    $user = Sentinel::findById($user_id);
    return (is_object($user)) ? $user : false;
}

function get_user_by_email($user_email)
{
    $credentials = [
        'login' => $user_email,
    ];

    $user = Sentinel::findByCredentials($credentials);
    return (is_object($user)) ? $user : false;
}

function get_user_by_mobile($user_mobile)
{
    $credentials = [
        'phone' => $user_mobile,
    ];

    $user = Sentinel::findByCredentials($credentials);
    return (is_object($user)) ? $user : false;
}


function get_users_by_role($role = 'administrator', $for_option = false)
{
    $return = [];
    $users = Sentinel::getUserRepository()->get();
    if (!empty($users) && is_object($users)) {
        foreach ($users as $user) {
            if ($user->inRole($role)) {
                
                    $return[$user->getUserId()] = $user->getUserId();
                
            }
        }
    }

    return $return;
}

function get_users_in_role($roles = ['administrator'], $exclude = '')
{
    $return = [];
    $users = Sentinel::getUserRepository()->get();
    if (!empty($users) && is_object($users)) {
        foreach ($users as $user) {
            $user_id = $user->getUserId();
            if (in_array($user->roles[0]['slug'], $roles) && $user_id != $exclude) {
                if (empty($user->first_name) && empty($user->last_name)) {
                    $return[$user_id] = trim(get_username($user_id));
                } else {
                    $return[$user_id] = trim(get_username($user_id)) . ' (' . $user->email . ')';
                }
            }
        }
    }
    return $return;
}

function get_user_meta($user_id, $meta_key, $default = '')
{
    $user_model = new \App\Models\User();

    $result = $user_model->getUserMeta($user_id, $meta_key);
    if (!empty($result) && is_object($result)) {
        return maybe_unserialize($result->meta_value);
    } else {
        return $default;
    }
}

function update_user_meta($user_id, $meta_key, $meta_value = '')
{
    $user_model = new \App\Models\User();

    return $user_model->updateUserMeta($user_id, $meta_key, $meta_value);
}

function remove_user_meta($user_id, $meta_key)
{
    $user_model = new \App\Models\User();

    return $user_model->deleteUserMetaByWhere([
        'user_id' => $user_id,
        'meta_key' => $meta_key
    ]);
}


function checkUser($mobile)
{
    $code = mt_rand(1000, 9999);
    $msg = "بلاجات تلبي الاحتياجات \r\n كود التفعيل" . $code;
    $x =   Http::post("https://www.msegat.com/gw/sendsms.php", [
        "userName" => "بلاجات",
        "numbers" => $mobile,
        "userSender" => "Blagat",
        "apiKey" => "2e02b50ebe8e11e93c532c0b1b5cbdcf",
        "msg" => "$msg"
    ]);

    $user_model = new \App\Models\User();
    $u = $user_model->getUserWithMobile($mobile);

    if ($u != null || isset($u->isNew) != 0) {


        $data = [
            'mobile' => $mobile,
            'password' => bcrypt($code),
            'code' =>   $code
        ];
        $new_user = $user_model->updateUser($u->id, $data);
        //send mobile phone code

        return  $u;
    } else {

        $user_model = new \App\Models\User();
        $user_model->password = bcrypt($code);
        $user_model->code = $code;

        $credentials = [
            'mobile' => $mobile,
            'password' => $user_model->password,
            'code' =>   $user_model->code,
            'isNew' => 1
        ];

        $new_user = create_new_user($credentials);
        $u = $user_model->getUserWithMobile($new_user['user']['mobile']);

        //send mobile phone code

        return  $u;
    }
}

function create_new_user($data = [])
{

    $default = [
        'email' => '',
        'password' => \Illuminate\Support\Str::random(12),
        'first_name' => '',
        'last_name' => '',
        'mobile' => '',
        'code' => '',
        'isNew' => '',
        'role' => 'customer',
    ];

    $data = wp_parse_args($data, $default);


    if (empty($data['mobile'])) {
        return [
            'status' => 0,
            'message' => __('Invalid mobile ad')
        ];
    }
    if (empty($data['password']) || strlen($data['password']) < 6) {
        return [
            'status' => 0,
            'message' => __('The password has at least 6 characters')
        ];
    }

    $user = Sentinel::findByCredentials([
        'login' => $data['mobile']
    ]);

    if ($user) {
        return [
            'status' => 0,
            'message' => __('This user already exists')
        ];
    } else {
        try {


            //     $user = Sentinel::register($data);

            // } else {

            $user = Sentinel::registerAndActivate($data);
            // }

        } catch (Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage()
            ];
        }

        if (!$user) {
            return [
                'status' => 0,
                'message' => __('Can not create new user')
            ];
        } else {

            $user_model = new \App\Models\User();
            $role = $user_model->getRoleByName($data['role']);
            $user_model->updateUserRole($user->getUserId(), $role->id);
            if ($approval == 'on') {
                $user_model->updateUser($user->getUserId(), ['request' => 'request_a_customer']);
                do_action('hh_user_registered_as_customer', $user->getUserId());
            }
            do_action('hh_registered_user', $user->getUserId(), $data['password'], $approval);

            return [
                'status' => 1,
                'message' => __('Registered successfully'),
                'user' => $user,
                'password' => $data['password']
            ];
        }
    }
}
