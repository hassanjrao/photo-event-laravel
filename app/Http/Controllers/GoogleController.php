<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackToGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('gauth_id', $user->id)->first();

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
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                    'password' => encrypt('123456dummy'),
                    'email_verified_at' => now()
                ]);

                $newUser->assignRole('user');

                Auth::login($newUser);

                return redirect('/');
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
