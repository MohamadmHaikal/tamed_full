<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class SendMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        return view("dashboard.send-message");
    }
    public function specificMessage()

    {
        return view("dashboard.send-message-specific");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SendMessage(Request $request)
    {
        $user = User::all();
        $phone = '';
        foreach ($user as $u) {
            if ($u['mobile'] != null)
                $phone = $phone . $u['mobile'] . ',';
        }
        $msg = '' . $request->message . '';
        $x =   Http::post("https://www.msegat.com/gw/sendsms.php", [
            "userName" => "بلاجات",
            "numbers" => $phone,
            "userSender" => "Blagat",
            "apiKey" => "2e02b50ebe8e11e93c532c0b1b5c",
            "msg" => "$msg"
        ]);
        if ($x['code'] == 1) {
            return $this->sendJson([
                'status' => 1,
                'message' => view('common.alert', ['message' => __('backend.Message Send successfully'), 'type' => 'success'])->render(),
                'reload' => true
            ]);
        } else {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['message' => __('backend.The message was not sent! Verify the information entered'), 'type' => 'danger'])->render(),
            ]);
        }
    }
    public function SendSpecific(Request $request)
    {
      
        $msg = '' . $request->message . '';
        $x =   Http::post("https://www.msegat.com/gw/sendsms.php", [
            "userName" => "بلاجات",
            "numbers" => $request->mobile,
            "userSender" => "Blagat",
            "apiKey" => "2e02b50ebe8e11e93c532c0b1",
            "msg" => "$msg"
        ]);
        if ($x['code'] == 1) {
            return $this->sendJson([
                'status' => 1,
                'message' => view('common.alert', ['message' => __('backend.Message Send successfully'), 'type' => 'success'])->render(),
                'reload' => true
            ]);
        } else {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['message' => __('backend.The message was not sent! Verify the information entered'), 'type' => 'danger'])->render(),
            ]);
        }
    }
}
