<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Sentinel;

class NotificationController extends Controller
{


    public function _deleteNotification($id)
    {
        $noti_model = new Notification();
        $deleted = $noti_model->deleteNotification($id);
        if ($deleted) {
            return redirect()->back();
        }

        return $this->sendJson([
            'status' => 0,
            'title' => __('System Alert'),
            'message' => __('Can not delete this notification')
        ]);
    }

    public function allNotifications($args)
    {
        $noti_model = new Notification();
        $allNotifications = $noti_model->allNotifications($args);

        return $allNotifications;
    }

    public function _allNotifications(Request $request, $page = 1)
    {
        $args = [
            'page' => $page
        ];

        $noti_model = new Notification();
        $allNotifications = $noti_model->allNotifications($args);
        if ($allNotifications['total']) {
            foreach ($allNotifications['results'] as $item) {
                Notification::where('ID', '=', $item->ID)
                    ->update(['seen' => '1']);
            }
        }

        return view("pages.notifications", compact('allNotifications'));
    }

    public static function get_inst()
    {
        static $instance;
        if (is_null($instance)) {
            $instance = new self();
        }

        return $instance;
    }
}
