<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterDummyUserRequest;
use App\Models\DummyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DummyUserController extends Controller
{
    //

    public function getId()
    {


        if (Cookie::has("dummy_user_id")) {


            if (
                $dummyUser = DummyUser::find(Cookie::get("dummy_user_id"))
            ) {

                return  response(["user_id" => $dummyUser->id], 200);
            }
            return  response(["user_id" => null], 200);
        }
        return  response(["user_id" => null], 200);
    }
    public function check(Request $request)
    {

        if (Cookie::has("dummy_user_id")) {


            if (
                DummyUser::find(Cookie::get("dummy_user_id"))
            ) {

                return  response(["is_dummy_user" => true], 200);
            }
            return  response(["is_dummy_user" => false], 200);
        }

        return  response(["is_dummy_user" => false], 200);
    }
    public function register(RegisterDummyUserRequest $request)
    {



        $dummyUser =  DummyUser::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "ip_address" => $request->ip()
        ]);
        return response(["user_id" => $dummyUser->id], 200)
            ->cookie('dummy_user_id', $dummyUser->id, 365 * 24 * 60);
    }
}
