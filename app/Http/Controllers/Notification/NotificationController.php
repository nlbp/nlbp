<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reading\ReadingPerson as Person;
use App\Notifications\TestNotification as Notify1;

class NotificationController extends Controller
{
    
    public function notification1(Person $person)
    {
        $detail = [
            'test1' => 'This is a test1.',
            'test2' => 'This is a test2.',
            'test3' => 'This is a test3.',
        ];
        
        $person->notify(new Notify1($detail));
        return view('notification/notification1');
    }
}
