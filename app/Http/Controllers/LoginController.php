<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username',
                'password') + ['status' => config('auth::parameters.user.status.active')];
        if (filter_var($credentials['username'], FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $credentials['username'];
            unset($credentials['username']);
        }

        if (auth()->attempt($credentials, $request->get('remember') === 'on')) {
            if (auth()->user()->email_verified_at === null) {
                return redirect()->route('signup.confirm');
            }
            return redirect()->route('dashboard.home', ['username' => auth()->user()->username]);
        }

        return redirect()->back()
            ->withInput($request->only('username', 'remember'))
            ->withErrors(['username' => __('auth.failed'),]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
