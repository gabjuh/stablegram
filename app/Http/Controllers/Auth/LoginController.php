<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.ser
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->maxAttempts('3');
        $this->decayMinutes('5');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $oauthUser = Socialite::driver($provider)->user();
        } catch(Exception $e) {
            return redirect('/login');
        }

        $oauthUser = $this->findOrCreateUser($oauthUser, $provider);

        Auth::login($oauthUser, true);

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($oauthUser, $provider)
    {
        $existingOAuth = SocialAuth::where('provider_name', $provider)
            ->where('provider_id', $oauthUser->getId())
            ->first();

        if ($existingOAuth) {
            return $existingOAuth->user;
        } else {
            $user = User::whereEmail($oauthUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $oauthUser->getEmail(),
                    'name' => $oauthUser->getName(),
                    'oauth_avatar' => $oauthUser->getAvatar(),
                ]);
            }

            $user->oauth()->create([
                'provider_id' => $oauthUser->getId(),
                'provider_name' => $provider,
                'oauth_avatar' => $oauthUser->avatar,

            ]);

            return $user;
        }
    }
}
