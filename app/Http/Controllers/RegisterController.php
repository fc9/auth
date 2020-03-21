<?php

namespace App\Http\Controllers;

use App\Services\RegisterService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use MenaraSolutions\Geographer\Earth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    use RegistersUsers;

    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    /**
     * @param string $indicator_username
     */
    public function showRegistrationForm()
    {
        if (Session::has(['indicator', 'email', 'agree_to_terms']) !== true) {
            return redirect('/signup');
        }
        $data['indicator'] = decrypt(Session::get('indicator'));
        $data['email'] = decrypt(Session::get('email'));
        $data['agree_to_terms'] = decrypt(Session::get('agree_to_terms'));
        Session::remove('indicator', 'email', 'agree_to_terms');

        $earth = new Earth();
        $data['countries'] = $earth->getCountries();
        //$data['selected_country'] = $earth->getCountries()->first()->getGeonamesCode();
        $data['selected_country'] = $earth->findOne(['code' => 'PA'])->getCode();
        $data['step'] = 2;

        return View::make('auth.register', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->service->register($request->all());

        auth()->login($user);
        return redirect()->route('signup.confirm_email');
    }
}
