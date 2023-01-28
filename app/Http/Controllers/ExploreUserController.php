<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('myapp.pages.users.index',[
            // 'users' => User::paginate(12), //Apabila menggunakan pagination
            'users' => User::get(),

        ]);
    }
}
