<?php

use App\Models\DummyUser;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Cookie;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('user{id}.chat.user{id2}', function ($user, $id,$id2) {
    if((int) $user->id === (int) $id) {
        return $user;
    }elseif((int) $user->id === (int) $id2){
        return $user;
    }
    else{
        return false;
    }
});



Broadcast::channel('public-dummy-user.{id}', function ($id) {
    if (Cookie::has("name") && Cookie::has("phone")) {
        $dummyUser = DummyUser::find(Cookie::get("dummy_user_id"));

        return $dummyUser && $dummyUser->id == $id;
    }

    return false;
});

