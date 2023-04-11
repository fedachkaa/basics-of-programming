<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return inertia(
            'Notification/Index',
            [
                'notifications'=> $request->user()
                ->notifications()->paginate(10),
            ]
        );
    }

    public function update(DatabaseNotification $notification){
        $notification->markAsRead();
        return redirect()->route('notification.index')->with('success', 'Сповіщення прочитано!');
    }

    public function destroy(DatabaseNotification $notification){
        $notification->delete();

        return redirect()->route('notification.index')->with('success', 'Сповіщення видалено!');

    }
}
