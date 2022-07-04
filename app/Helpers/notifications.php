<?php

use App\Jobs\SendAdsNotification;
use App\Models\Notification;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;


function addNotification($from, $to, $title = '', $message = '', $type = 'global')
{
    $noti_model = new Notification();
    $data = [
        'user_from' => $from,
        'user_to' => $to,
        'title' => $title,
        'message' => $message,
        'type' => $type,
        'created_at' => date('Y-m-d H:s:i')
    ];

    return $noti_model->insertNotification($data);
}
function addMessage($from, $to, $title = '')
{
    // default variables
    $error = (object)[
        'status' => 0,
        'message' => null
    ];
    $attachment = null;


    if (!$error->status) {
        // send to database
        $messageID = mt_rand(9, 999999999) + time();
        Chatify::newMessage([
            'id' => $messageID,
            'type' => "user",
            'from_id' => $from,
            'to_id' => $to,
            'body' => $title,
            'attachment' => ($attachment) ? json_encode((object)[
                'new_name' => $attachment,
                'old_name' => "",
            ]) : null,
        ]);

        // fetch message to send it with the response
        $messageData = Chatify::fetchMessage($messageID, $from);

        // send to user using pusher
        Chatify::push('private-chatify', 'messaging', [
            'from_id' => $from,
            'to_id' => $to,
            'message' => Chatify::messageCard($messageData, 'default')
        ]);
    }
}
function SendAdsNotification($id, $message, $title, $type)
{
    $users = User::where('activitie_id', '=', $id)->chunk(50, function ($data) use ($message, $title, $type) {

        dispatch(new SendAdsNotification($data, $type, $title, $message, get_current_user_id()));
    });
}
function deleteNotification($noti_id)
{
    $noti_model = new Notification();
    return $noti_model->deleteNotification($noti_id);
}
