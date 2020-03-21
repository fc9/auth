<?php

namespace App\Auth\Http\Controllers\Api;

use App\Http\Requests\RegisterRequest;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = (new \App\Services\RegisterService)->register($request->all());

        return response()->json($user, 201);
    }
}