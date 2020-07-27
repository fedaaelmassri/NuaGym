<?php

namespace App\Http\Controllers\AuthMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\members;
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
     return members::guard('members');
    }

    // login from for teacher
    public function showLoginForm()
    {
        return view('authmember.login');
    }
    public function logout() {
        Session::flush();
        members::logout();
        return Redirect('member.login');
    }

}
