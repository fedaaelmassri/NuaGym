<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\programs;
use Auth;

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
