<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class PresentationController extends Controller
{
    public function home($indicator = '')
    {
        return View::make('auth.presentation', compact('indicator'));
    }
}
