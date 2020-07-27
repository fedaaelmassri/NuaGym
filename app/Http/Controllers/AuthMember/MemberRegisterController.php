<?php

namespace App\Http\Controllers\AuthMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Redirect,Response;
Use App\User;
use App\members;
use Session;


class MemberRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/successregister';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:members')->except('logout');

        // $this->middleware('guest');
        // if(!)
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'mobile' => ['required', 'numeric', 'min:8'],
            'identity' => ['required', 'numeric', 'min:12'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'mobile' => ['required', 'numeric'  ,'digits:8'],
            'identity' => ['required', 'numeric',' digits:12'],
            'date_of_birth' => ['required','date' ],
            'gender' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();

        $check = $this->create($data);
        if($check){
             $res= $this->postRequest($data);
            return redirect( route('successregister') )->with([
                'message' => sprintf('You have been successfully registered!'),
                'alert-type' => 'success'
            ]);
            } else {
                return redirect()->back()->with([
                    'message' => sprintf('Error in registering'),
                    'alert-type' => 'error'
                ])->withInput();
            }

         }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        $birthday = strtotime( $data['date_of_birth']);

             $newformat = date('Y-m-d',$birthday);

        return members::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'identity' => $data['identity'],
            'date_of_birth' =>$newformat,
            'gender' => $data['gender'],
            'city' => $data['city'],
            'country' => $data['country'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function postRequest(array $data)
    {
        $birthday = strtotime( $data['date_of_birth']);

             $newformat = date('Y-m-d',$birthday);

        $client = new Client();
                $params=[

            'firstname' => $data['name'],
            "lastname"=> "memberkj1",
             'email' => $data['email'],
             'mobile' => $data['mobile'],
             'identity' => $data['identity'],
             'birthday' => $newformat,
             'gender' => $data['gender'],
             'place' => $data['city'],
             'country' => $data['country'],
             'formatted_address' => $data['address'],
            "active"=> true,
          "is_pro"=> false,
         "zip"=> "1016 XX12",
          "street"=> "Elandsgracht 32",
       "street_extra"=> "3rd floor",
      "phone"=> "0201234567",
      "club_id"=> 37662,
          "lang"=> "ar"
                ];
         $request = $client->request('POST','https://api.virtuagym.com/api/v1/club/37662/member?api_key=8gsl4CxGyN4fMrM41LAfjNjxDkupxLcUxWp8tgygsv&club_secret=CS-37662-ACCESS-Q1mD1XFNBzuF0WYmfEwKKDVbM', [
            'json' => $params
        ] );
        return $request;

    }
    public function showRegisterForm()
    {
        return view('authmember.register', ['url' => 'members']);
    }

    public function successregister()
    {
        return view('authmember.successregister', ['url' => 'members']);


    }


}
