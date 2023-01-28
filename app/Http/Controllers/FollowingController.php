<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{

    public function index(User $user, $following)
    {
        $follows = $following == "following" ? $user->follows : $user->followers;

        if ($following !== "following" && $following !== "follower") {
            return redirect(route('profile', $user->username));
        }

       return view('myapp.pages.users.following',[
        'user' => $user,
        'follows' => $follows,
       ]);
    }

    public function store(Request $request, User $user)
    {
        // CARA DENGAN PENGKONDISIAN
        // if (Auth::user()->hasFollow($user)) {
        //     Auth::user()->unfollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }

        // CARA DENGAN TERNARY
        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);

        return back()->withInfo('You are following the user');
    }

}
