<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();

            $finduser = User::where('facebook_id', $user->id)->first();


            if ($finduser) {

                Auth::login($finduser);

                $finduser->update([
                    "email_verified_at" => now()
                ]);

                if ($finduser->hasRole('admin')) {

                    return redirect()->intended('admin');
                } else if ($finduser->hasRole('host')) {

                    return redirect()->intended('host');
                }

                return redirect()->intended('/');

                                                                                                 
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'facebook_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                    'email_verified_at' => now()
                ]);

                $newUser->assignRole('user');

                Auth::login($newUser);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {

            Log::error("FacebookController::handleFacebookCallback() ", [
                "message" => $e->getMessage(),
                "file" => $e->getFile(),
                "stack" => $e->getTraceAsString(),
            ]);

            dd($e->getMessage());
        }
    }
}
