<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        if (Auth::check()) {
            return redirect(route('timeline'));
        }

        return view('welcome');
    }
}
