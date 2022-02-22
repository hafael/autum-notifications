<?php

namespace Autum\Notifications\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Autum\Notifications\Http\Resources\NotificationResource;

class NotificationController extends Controller
{

    public function notifications(Request $request)
    {
        $account = $request->user();

        $notifications = $account->notifications()->latest()->paginate();

        return NotificationResource::collection($notifications);
    }

    public function readNotification(Request $request)
    {
        $account = $request->user();

        $notificationId = $request->route('id');

        $notification = $account->notifications()->where('id', $notificationId)->first();

        if(!empty($notification) && empty($notification->read_at)) {
            $notification->markAsRead();
        }

        return new NotificationResource($notification);
    }

    public function readAllNotifications(Request $request)
    {
        $account = $request->user();

        $account->unreadNotifications->markAsRead();

        $notifications = $account->notifications()->latest()->paginate();

        return NotificationResource::collection($notifications);
    }

    public function clearNotifications(Request $request)
    {
        $account = $request->user();

        $account->readNotifications()->delete();

        $notifications = $account->notifications()->latest()->paginate();

        return NotificationResource::collection($notifications);
    }

}
