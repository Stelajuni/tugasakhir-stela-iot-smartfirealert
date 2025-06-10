<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SensorNotification;
use App\Models\User;

class NotificationController extends Controller
{
    public function send(Request $request) {
    $user=User::first();
    $gas=$request->post('gas');
    $api=$request->post('api');
        Mail::to($user)
    ->send(new SensorNotification($gas, $api));
    }
}
