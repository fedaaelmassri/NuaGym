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
    protected $redirectTo = '/memberdashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'mobile' => ['required', 'numeric', 'min:10'],
            'identity' => ['required', 'numeric', 'min:9'],
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
            'mobile' => ['required', 'numeric', 'min:10'],
            'identity' => ['required', 'numeric', 'min:9'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();

        $check = $this->create($data);
             $res= $this->postRequest($data);
              dd($res);

            // return redirect( route('memberdashboard') )->with([
            //     'message' => sprintf('You have been successfully registered!'),
            //     'alert-type' => 'success'
            // ]);


         }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return members::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'identity' => $data['identity'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'city' => $data['city'],
            'country' => $data['country'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function postRequest(array $data)
    {
        $client = new \GuzzleHttp\Client();
        $body= array(
            'firstname' => $data['name'],
            "lastname"=> "member1",
             'email' => $data['email'],
             'mobile' => $data['mobile'],
             'identity' => $data['identity'],
             'birthday' => $data['date_of_birth'],
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
        );
        $headers = ['Content-Type' => 'application/json'];
        $params[] = $body;
        $Nbody = json_encode($params);
        $response = $client->post('https://api.virtuagym.com/api/v1/club/37662/member?api_key=8gsl4CxGyN4fMrM41LAfjNjxDkupxLcUxWp8tgygsv&club_secret=CS-37662-ACCESS-Q1mD1XFNBzuF0WYmfEwKKDVbM',$headers, ['body' => $Nbody]);
        // $results = $response->getBody()->getContents();
        // $results = json_decode($results);
        //  return response()->json($results);
         $response = json_decode($response->getBody(), true);

        // $response = $response->getBody()->getContents();
        // print_r($results);
    }
    public function showRegisterForm()
    {
        return view('authmember.register', ['url' => 'members']);
    }


}
