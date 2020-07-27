<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\programs;
use App\member_programs;
use Auth;

class ProgramsController extends Controller
{
    //
    public function index(){
        return view('frontend.home-2')->with([
            'programs' => programs::get()
        ]);


    }

    public function payPrograms($id){
        $flight = App\Flight::updateOrCreate(
            ['departure' => 'Oakland', 'destination' => 'San Diego'],
            ['price' => 99, 'discounted' => 1]
        );


        if(!auth()->check()){
            return redirect(route('login'));

         }
         else{
            return redirect(route('dashbaord'));


        }

    }
}
