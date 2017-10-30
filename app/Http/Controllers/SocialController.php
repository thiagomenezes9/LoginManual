<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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
        return redirect($this->redirectTo);
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
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }

}
