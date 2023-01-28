<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('myapp.pages.users.edit');
    }

    public function update(Request $request)
    {

        $input = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'alpha_num'],
        ]);        

        auth()->user()->update($input);

        return redirect()->route('profile', auth()->user()->username)->with('info', 'Your profile has been updated!');
    }
}
