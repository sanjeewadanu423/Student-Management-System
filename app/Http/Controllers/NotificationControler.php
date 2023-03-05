<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\RentalNotification;

class NotificationControler extends Controller
{
    public function notification()
    {
        $admin = User::find(1);

        $mailBody='body';
        $mailSubject='subject';
        // notification todo: email only for now
        $admin->notify(new RentalNotification($mailSubject, $mailBody));
        dd($admin->notifications);
    }

    public function notif(Request $request){

        // dd($request);

         if($request->view  != '')
           {
             Auth::user()->unreadNotifications->markAsRead();
           }

           $notification=Auth::user()->unreadNotifications;
           $unseen_notification =$notification->count();


           return response()->json([
             'noti' => $notification,
             'count' => $unseen_notification,
           ]);

       }
}
