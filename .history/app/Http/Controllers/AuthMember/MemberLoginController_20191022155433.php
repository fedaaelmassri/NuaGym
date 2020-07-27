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
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (members::attempt($credentials)) {
            // Authentication passed...
            return redirect( route('memberdashboard') )->withSuccess('Great! You have Successfully loggedin');

        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
        return redirect( route('member.login') )->withSuccess('Great! You have Successfully loggedin');

    }

    // login from for teacher
    public function showLoginForm()
    {
        return view('authmember.login');
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('member.login');
    }

}
