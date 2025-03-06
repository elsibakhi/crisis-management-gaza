<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserPasswordRequest;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $user = Auth::user();
        $profile = $user->profile;

        return view("user.profile.edit", data: compact(["profile", "user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {

        $user = Auth::user();
        $reload = false;
        DB::transaction(function () use ($request, $user, &$reload) {

            $user->update([
                "name" => $request->name,
                "email" => $request->email,


            ]);


            $profile = $user->profile;

            if ($request->locale != $profile->locale || $request->theme != $profile->theme) {
                $reload = true;
            }
            $profile_elements = [
                "phone" => $request->phone,
                "locale" => $request->locale,
                "theme" => $request->theme,


            ];


            if ($request->hasFile('profile_avatar')) {
                if ($profile->logo) {
                    if (Storage::disk('public')->exists($profile->logo)) {
                        Storage::disk('public')->delete($profile->logo);
                    }
                }
                $logo_path = $request->file('profile_avatar')->store('users/profile', 'public');
                $profile_elements =  array_merge($profile_elements, ["logo" => $logo_path]);
            } else {
                if ($request->profile_avatar_remove) {
                    if ($profile->logo) {
                        if (Storage::disk('public')->exists($profile->logo)) {
                            Storage::disk('public')->delete($profile->logo);
                        }
                    }

                    $profile_elements =  array_merge($profile_elements, ["logo" => null]);
                }
            }


            $profile->update($profile_elements);
        });

        return response()->json(['status' => 200, "reload" => $reload]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function check_password(CheckUserPasswordRequest $request)
    {
        //

        $user_password = Auth::user()->password;
        $status = Hash::check($request->password, $user_password);
        Session::flash("status", $status);

        return response(["status" => $status]);
    }
    public function update_password(UpdateUserPasswordRequest $request)
    {
        //

        if (Session::has("status")) {

            if (!Session::get("status")) {
                return response(["status" => 403]);
            }
        } else {
            return response(["status" => 403]);
        }


        Auth::user()->update([
            "password" => Hash::make($request->password),
        ]);

        return response(["message" => __("Your password updated successfully!")], 200);
    }
    public function destroy(Profile $profile)
    {
        //
    }
}
