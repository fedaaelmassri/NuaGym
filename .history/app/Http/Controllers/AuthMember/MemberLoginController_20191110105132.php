<?php

namespace App\Http\Controllers\AuthMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\members;
use Auth;
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

        // $credentials = $request->only('email', 'password');
        if (Auth::guard('members')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>'1'], $request->get('remember'))) {
            // Authentication passed...
            // Session::set('member_id', $this->userid($request->email));
            if((Session::has('ProgramID'))&&(Session::has('CoachID'))){
                return $next($request);
            }

            return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Great! You have Successfully loggedin'),
            'alert-type' => 'success'
            ]);

        //   if(Auth::guard('members')->user()->status==='1'){
        //     return redirect( route('memberdashboard') )->withSuccess('Great! You have Successfully loggedin');
        //   }
        //  else {
        //     return redirect( route('member.login') )->withSuccess('Oppes! You have Blocked');

        //   }
        }else{
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
