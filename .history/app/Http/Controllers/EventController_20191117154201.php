<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Events;
class EventController extends Controller
{
    //
    public function index()
    {

        return view('backend.Events.index')->with([
            'programs' => Events::get(),

        ]);
    }

}
