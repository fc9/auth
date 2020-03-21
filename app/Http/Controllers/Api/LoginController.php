<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    private $successStatus = 200;

    public function login(LoginRequest $request)
    {
        $status = improve(config('auth::parameters.user.status'))->active;
        $credentials = $request->only('username', 'password') + ['status' => $status];
        if (filter_var($credentials['username'], FILTER_VALIDATE_EMAIL)) {
            dd($credentials);
            $credentials['email'] = $credentials['username'];
            unset($credentials['username']);
        }
        dd($credentials);

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('token')->accessToken;
            $success['success'] = true;
            $success['message'] = "Success! you are logged in successfully";
            $success['token'] = $token;
            return response()->json(['success' => $success], $this->successStatus);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => auth()->check()]);
    }

}