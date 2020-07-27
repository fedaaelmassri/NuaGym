<?php

namespace App\Http\Controllers\AuthMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 use App\members;
use App\member_programs;
use Config;
use Auth;
use Session;
use Cookie;
use App\programs;
use App\Events;
use App\Eventsport;
use App\subscriptions;
use App\transactions;
use App\Settings;

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
        $this->middleware('guest:members')->except('logout');

            //  $this->data = config('paymentconfig');
            // echo $data['basURL'].'/Token';
            // exit;
            $this->data['basURL'] = Settings::where('constant', 'apikey')->first('value')->value;
            $this->data['username']  = Settings::where('constant', 'username')->first('value')->value;
            $this->data['password'] =Settings::where('constant', 'password')->first('value')->value;
   
        }
        public function iniatePayment(){
    
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,$this->data['basURL'].'/Token');
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $this->data['username'],'password' =>$this->data['password'])));
            $result = curl_exec($curl);
            $info = curl_getinfo($curl);
            curl_close($curl);
            $json = json_decode($result, true);
            return $json;
    
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
            if(Session::has('payable_id')&&Session::has('type')){
                 $payable_id=Session::get('payable_id');
                $cid=Session::get('CoachID');
                $type=Session::get('type');
                $mid= Auth::guard('members')->user()->id;
                $m_name = Auth::guard('members')->user()->name;
                $m_email = Auth::guard('members')->user()->email;
                $m_mobile = Auth::guard('members')->user()->mobile;
                $m_address = Auth::guard('members')->user()->address;
        
                 if($type=='program'){
                  $getdata = programs::where('id', '=', $payable_id)->first();
                  
        
                } if($type=='eventsport'){
                  $getdata = Eventsport::where('id', '=', $payable_id)->first();
        
                }
                if($type=='event'){
                  $getdata = Events::where('id', '=', $payable_id)->first();
        
                }
                  if($cid!=null)
                {
                          $cid=$cid;//request()->route('c_id');
                
                }else{
                  $cid=null;
                }
                $pymentconfig = $this->iniatePayment();
                if(isset($pymentconfig['access_token']) && !empty($pymentconfig['access_token'])){
                    $access_token=$pymentconfig['access_token'];
                }else{
                  $access_token='';
                }
                if(isset($pymentconfig['token_type']) && !empty($pymentconfig['token_type'])){
                    $token_type=$pymentconfig['token_type'];
                      }else{
                          $token_type='';
                      }
                      if(isset($pymentconfig['access_token']) && !empty($pymentconfig['access_token']))
                      {
                         $t= time();
                         $item_name= $getdata->name;
                         $item_id=$getdata->id;
                         $item_cost=$getdata->cost;
                  
                $post_string = '{
                    "InvoiceValue": '.$item_cost.',
                    "CustomerName": "'.$m_name.'",
                    "CustomerBlock": "Block",
                    "CustomerStreet": "Street",
                    "CustomerHouseBuildingNo": "Building no",
                    "CustomerCivilId": "123456789124",
                    "CustomerAddress": "'.$m_address.'",
                    "CustomerReference": "'.$t.'",
                    "DisplayCurrencyIsoAlpha": "KWD",
                    "CountryCodeId": "+965",
                    "CustomerMobile": "'.$m_mobile.'",
                    "CustomerEmail": "'.$m_email.'",
                    "DisplayCurrencyId": 3,
                    "SendInvoiceOption": 1,
                    "InvoiceItemsCreate": [
                      {
                        "ProductId": null,
                        "ProductName": "'.$item_name.'",
                        "Quantity": 1,
                        "UnitPrice": '.$item_cost.'
                      }
                    ],
                   "CallBackUrl": "http://nuakw.com/callback",
                    "Language": 2,
                     "ExpireDate": "2022-12-31T13:30:17.812Z",
          "ApiCustomFileds": "payable_id='.$payable_id.'&type='.$type.'&member_id='.$mid.'&coach_id='.$cid.'",
          "ErrorUrl": "http://www.bing.com"
                  }';
                  //http://nuakw.com/callback
                $soap_do     = curl_init();
               curl_setopt($soap_do, CURLOPT_URL, $this->data['basURL']."/ApiInvoices/CreateInvoiceIso");
               curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
               curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
               curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
               curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
               curl_setopt($soap_do, CURLOPT_POST, true);
               curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
               curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Content-Length: ' . strlen($post_string),  'Accept: application/json','Authorization: Bearer '.$access_token));
               $result1 = curl_exec($soap_do);
                $err    = curl_error($soap_do);
              $json1= json_decode($result1,true);
               $RedirectUrl= $json1['RedirectUrl'];
               
               $ref_Ex=explode('/',$RedirectUrl);
              $referenceId =  $ref_Ex[3];
               curl_close($soap_do);
               return redirect($RedirectUrl);
        
                  }else{
                   print_r("Error: ".$pymentconfig['error']."<br>Description: ".$pymentconfig['error_description']);
                  }
                
                // if(!$report){
                //         $program = new  member_programs();
                //         $program->program_id =$pid;
                //         $program->coache_id=$cid;
                //         $program->member_id =$mid;
                //         if($program->save()){
                //             Session::forget('ProgramID');
                //             Session::forget('CoachID');

                //             return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Great! You have Successfully loggedin And successfully participated in the program "%s"', $program->program_id),
                //             'alert-type' => 'success'
                //             ]);
                //             }
                //         }else{
                //     Session::forget('ProgramID');
                //     Session::forget('CoachID');
                //     return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Great! You have Successfully loggedin And Aleardy participated in the program ' ),
                //     'alert-type' => 'success'
                //     ]);
                //}

              
            
                }
            else{
                    return redirect()->route('memberdashboard')->with([ 'message' => sprintf('Great! You have Successfully loggedin'),
                   'alert-type' => 'success'
                        ]);
                  }
         }
        else{
                 return redirect()->route('member.login')->with([ 'message' => sprintf('Oppes! You have entered invalid credentials'),'alert-type' => 'error'
                 ]);
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
