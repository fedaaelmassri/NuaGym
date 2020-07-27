<?php

namespace App\Http\Controllers\AuthMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/member/home';

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

    // login from for teacher
    public function showLoginForm()
    {
        return view('authmember.login');
    }

}
