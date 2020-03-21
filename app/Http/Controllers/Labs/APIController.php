<?php

namespace App\Http\Controllers\Labs;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Request;
use Infra\Facades\Auth;

class APIController extends Controller
{
    private $successStatus = 200;

    private $loginProxy;

//    public function __construct(LoginProxy $loginProxy)
//    {
//        $this->loginProxy = $loginProxy;
//    }
//
//    public function login(LoginRequest $request)
//    {
//        $email = $request->get('email');
//        $password = $request->get('password');
//
//        return $this->response($this->loginProxy->attemptLogin($email, $password));
//    }
//
//    public function refresh(Request $request)
//    {
//        return $this->response($this->loginProxy->attemptRefresh());
//    }
//
//    public function logout()
//    {
//        $this->loginProxy->logout();
//
//        return $this->response(null, 204);
//    }

    //----------------- [ Register user ] -------------------
    public function registerUser(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|alpha_num|min:5',
                'confirm_password' => 'required|same:password'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['Validation errors' => $validator->errors()]);
        }

        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'city' => $request->city
        );

        // check if email already registered
        $user = User::where('email', $request->email)->first();
        if (!is_null($user)) {
            $data['message'] = "Sorry! this email is already registered";
            return response()->json(['success' => false, 'status' => 'failed', 'data' => $data]);
        }

        // create and return data
        $user = User::create($input);
        $success['message'] = "You have registered successfully";

        return response()->json(['success' => true, 'user' => $user]);
    }

    // -------------- [ User Login ] ------------------

    public function userLogin(Request $request)
    {
        if (auth()->attempt(['username' => request('username'), 'password' => request('password')])) {

            // getting auth user after auth login
            $user = auth()->user();

            $token = $user->createToken('token')->accessToken;
            $success['success'] = true;
            $success['message'] = "Success! you are logged in successfully";
            $success['token'] = $token;

            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['success' => true]);
    }
}