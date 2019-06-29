<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reading         \ReadingPerson;
use App\Notifications\TestNotification as Notify1;

class NotificationController extends Controller
{
    
    public function notification1()
    {
        $detail = [
            'test1' => 'This is a test1.',
            'test2' => 'This is a test2.',
            'test3' => 'This is a test3.',
        ];
        
        $notify = ReadingPerson::find(2);
        $notify->notify(new Notify1($detail));
        
        return view('notification/notification1', [
            'notify' => $notify,
        ]);
    }
}
