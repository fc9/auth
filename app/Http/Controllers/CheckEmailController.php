<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Http\Requests\CheckEmailRequest;

class CheckEmailController extends Controller
{
    public function showCheckForm($indicator = '')
    {
        $step = 1;
        return View::make('auth.check', compact('step', 'indicator'));
    }

    public function check(CheckEmailRequest $request)
    {
        $validated = $request->validated();
        Session::put('indicator', encrypt($validated['indicator']));
        Session::put('email', encrypt($validated['email']));
        Session::put('agree_to_terms', encrypt($request->get('agree_to_terms')));
        return redirect()->route('signup.register');
    }
}
