<?php

namespace App\Http\Controllers\AuthMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\members;
use App\member_programs;
use Auth;
use App\events_member;
class MemberLoginController extends Controller
{
    // use AuthenticatesUsers;

    protected $redirectTo = '/memberdashboard';

   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:members')->except('logout');

    }
    /*
    *
     _
     _ @return property guard use for login
     _
     _
     */
    public function guard()
    {
     return Auth::guard('members');
    }
    // public function userid($email){

    //      $members = members::findOrfail($email);
    //     $member_id=$members->id;

    //     return $member_id;


    // }
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

         if (Auth::guard('members')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>'1'], $request->get('remember'))) {
            if(((Session::has('ProgramID'))&&(Session::has('CoachID')))||(Session::has('EventId'))){
            if((Session::has('ProgramID'))&&(Session::has('CoachID'))){
                $pid=Session::get('ProgramID');
                $cid=Session::get('CoachID');
                $mid= Auth::guard('members')->user()->id;
                $report = member_programs::where('program_id', '=', $pid)
                ->where('member_id', '=', $mid)
                ->where('coache_id', '=', $cid)
                ->first();
                if(!$report){
                        $program = new  member_programs();
                        $program->program_id =$pid;
                        $program->coache_id=$cid;
                        $program->member_id =$mid;
                        if($program->save()){
                            Session::forget('ProgramID');
                            Session::forget('CoachID');

                            return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Great! You have Successfully loggedin And successfully participated in the program "%s"', $program->program_id),
                            'alert-type' => 'success'
                            ]);
                            }
                        }else{
                    Session::forget('ProgramID');
                    Session::forget('CoachID');
                    return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Great! You have Successfully loggedin And Aleardy participated in the program ' ),
                    'alert-type' => 'success'
                    ]);
                }

              }
            if(Session::has('EventId')){
                $eventid= Session::get('EventId');
                $mid= Auth::guard('members')->user()->id;
                $report = events_member::where('event_id',$eventid)->where('member_id',$mid)->first();
                if(!$report){
                    $event = new  events_member();
                    $event->event_id =$eventid;
                    $event->member_id =$mid;
                    if($event->save()){
                        Session::forget('EventId');
                        return redirect( route('memberevent') )->with([ 'message' => sprintf('Great! You have Successfully loggedin And successfully participated in the program "%s"', $program->program_id),
                        'alert-type' => 'success'
                        ]);
                        }
                    }else{
                        Session::forget('EventId');
                         return redirect( route('memberevent') )->with([ 'message' => sprintf('Great! You have Successfully loggedin And Aleardy participated in the program ' ),
                        'alert-type' => 'success'
                        ]);

                    }

                }
            }else{
                    return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Great! You have Successfully loggedin'),
                   'alert-type' => 'success'
                        ]);
                  }
         }
        else{
                 return redirect( route('member.login') )->withSuccess('Oppes! You have entered invalid credentials');
        }

    }
    public function username(){
        return('email');
    }
    // login from for teacher
    public function showLoginForm()
    {
        return view('authmember.login');
    }
    public function logout() {
        // if(Auth::guard('members')){
        //     Session::flush();
        Auth::guard('members')->logout();
        return Redirect( route('home') );
    // }
    }

}
