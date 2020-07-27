<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Events;
use Carbon\Carbon;

class EventsController extends Controller
{
    //
    public function index()
    {

        return view('frontend.events')->with([
            'Events' => Events::get(),

        ]);
    }
}
