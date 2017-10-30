<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();

    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user, 'facebook');
        Auth::login($authUser, true);
//        dd($user);
        return redirect('/auth/login');
    }


    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'matricula' => '123',
//            'provider_id' => $user->id
            'password' => '123'
        ]);
    }

}
