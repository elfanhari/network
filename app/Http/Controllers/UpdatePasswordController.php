<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('myapp.pages.password.edit');
    }

    public function update(Request $request)
    {  
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect()->route('profile', auth()->user()->username)->with('info', 'Your password has been updated!');
        }

    }
}
