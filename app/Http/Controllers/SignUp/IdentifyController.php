<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Requests\SignUp\IdentifyRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class IdentifyController extends Controller
{
    public function showIdentifyForm($indicator = '')
    {
        Session::put('indicator', $indicator);
        return View::make('auth.home', compact('indicator'));
    }

    public function identify(IdentifyRequest $request)
    {
        $validated = $request->validated();
        Session::put('indicator', encrypt($validated['indicator']));
        Session::put('email', encrypt($validated['email']));
        Session::put('agree_to_terms', encrypt($request->get('agree_to_terms')));

        return redirect()->route('signup.confirm_mail');
    }
}
