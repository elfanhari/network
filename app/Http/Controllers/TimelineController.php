<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $statuses = Auth::user()->statuses; //panggil relasi
        $statuses = Auth::user()->timeline();
        return view('myapp.pages.timeline',[
            'statuses' => $statuses,
        ]);
    }
}
