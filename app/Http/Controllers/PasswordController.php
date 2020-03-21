<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class PasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showForgotPasswordForm()
    {
    }

    public function sendPasswordResetLinkEmail()
    {
    }

    public function showResetPasswordForm()
    {
    }

    public function reset()
    {
    }
}
