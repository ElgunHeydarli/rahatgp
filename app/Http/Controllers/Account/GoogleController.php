<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where(['google_id' => $user->id])->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'verification_token' => Str::random(100),
                    'google_id' => $user->id,
                    'active' => 1,
                    'password' => Hash::make('12345678'),
                ]);

                $newUser->syncRoles(['member']);

                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
