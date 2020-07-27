<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\programs;

class ProgramsController extends Controller
{
    //
    public function index(){



    }

    public function payPrograms(){
        if(!auth()->check()){
            return redirect(route('login'));

         }
         else{
            return redirect(route('dashbaord'));


        }

    }
}
