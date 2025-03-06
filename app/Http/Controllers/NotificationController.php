<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function loadUserNotification()
    {
        return view("components.user-notifications");
    }

    public function loadContributionAcceptanceNotifications()
    {
        $dummyUser = \App\Models\DummyUser::find(\Illuminate\Support\Facades\Cookie::get("dummy_user_id"));
        return view("components.notification.dummyUser.contributionNotifications", compact('dummyUser'));
    }
}
