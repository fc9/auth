<?php

namespace App\Http\Controllers\Labs;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LabsController extends Controller
{
    private $loginProxy;

    public function __construct(LoginProxy $loginProxy)
    {
        $this->loginProxy = $loginProxy;
    }

//    public function login()
//    {
//        return view('labs.login');
//    }

    private $successStatus = 200;

    public function login(LoginRequest $request)
    {
        dd(config('auth::parameters.user.status.active'));

        $credentials = $request->only('username', 'password') + ['status' => config('auth::parameters.user.status')];
        if (filter_var($credentials['username'], FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $credentials['username'];
            unset($credentials['username']);
        }

        if (auth()->attempt($credentials, $request->get('remember') === 'on')) {
            if (auth()->user()->email_verified_at === null) {
                //return redirect()->route('signup.confirm');

                $user = auth()->user();
                $success['success'] = true;
                $success['message'] = __("Success! you are logged in successfully");
                $success['token'] = $user->createToken('token')->accessToken;
                return response()->json(['success' => $success], 200);
            }
            //return redirect()->route('dashboard.home', ['username' => auth()->user()->username]);

            $user = auth()->user();
            $success['success'] = true;
            $success['message'] = __("Success! you are logged in successfully");
            $success['token'] = $user->createToken('token')->accessToken;
            return response()->json(['success' => $success], 200);
        }

//        return redirect()->back()
//            ->withInput($request->only('username', 'remember'))
//            ->withErrors(['username' => __('auth.failed'),]);
        return response()->json(['error' => 'Unauthorised'], 401);
        //return response()->json(['Validation errors' => $validator->errors()]);

//        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
//
//            // getting auth user after auth login
//            $user = Auth::user();
//
//            $token = $user->createToken('token')->accessToken;
//            $success['success'] = true;
//            $success['message'] = "Success! you are logged in successfully";
//            $success['token'] = $token;
//
//            return response()->json(['success' => $success], $this->successStatus);
//        } else {
//            return response()->json(['error' => 'Unauthorised'], 401);
//        }
    }

    public function loginDisabled()
    {
        return view('labs.login-disabled');
    }

    public function loginHelp()
    {
        return view('labs.login-help');
    }

    public function captcha()
    {
        return view('labs.captcha');
    }

    public function register1()
    {
        return view('labs.register-1');
    }

    public function register2()
    {
        return view('labs.register-2');
    }

    public function register3()
    {
        $email = \Fc9\Auth\entities\PasswordReset::cloudMail('fabiocabral@gmail.com');
        //TODO: create facade > email()->cloud('fabiocabralsantos@gmail.com')
        return view('labs.confirm_email', compact('email'));
    }

    public function registerDisabled()
    {
        return view('labs.register-disabled');
    }

    public function registerMinimumRequirements()
    {
        return view('labs.register-minimum-requirements');
    }

    public function forgotPassword()
    {
        return view('labs.forgot-password');
    }

    public function forgotEmail()
    {
        return view('labs.forgot-email');
    }

    public function userBlocked()
    {
        return view('labs.user-blocked');
    }

    public function userBanned()
    {
        return view('labs.user-banned');
    }

    public function underMaintenance()
    {
        return view('labs.under-maintenance');
    }

    public function page404()
    {
        return view('labs.page-404');
    }

    public function page500()
    {
        return view('labs.page-500');
    }

    public function inactivity()
    {
        return view('labs.inactivity');
    }

    public function serviceStatus()
    {
        return view('labs.service-status');
    }
}
