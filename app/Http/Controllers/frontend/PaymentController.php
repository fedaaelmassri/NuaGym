<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
class PaymentController extends Controller
{
    //
     public function __construct()
    {
        //  $this->data = config('paymentconfig');
           //===========MyCode============
         $this->data['basURL'] = Settings::where('constant', 'apikey')->first('value')->value;
         $this->data['username']  = Settings::where('constant', 'username')->first('value')->value;
         $this->data['password'] =Settings::where('constant', 'password')->first('value')->value;
              // =======End MyCode=================
            
 
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
    public function makePyment($payable_id,$type,$c_id=null){

      $cid=0;
  
      if(!auth()->guard('members')->check())
      {
        //if(isset($_GET['c_id']))
        if($c_id!=null)
           {
            $cid=$c_id;//request()->route('c_id');
           }
           else
           {
            $cid=0;
            }
    
          Session::put('payable_id', $payable_id);
          Session::put('type', $type);
          Session::put('CoachID', $cid);

         return redirect(route('member.login'));

      }
    else{

            $mid= Auth::guard('members')->user()->id;
            $m_name = Auth::guard('members')->user()->name;
            $m_email = Auth::guard('members')->user()->email;
            $m_mobile = Auth::guard('members')->user()->mobile;
            $m_address = Auth::guard('members')->user()->address;

            if($type=='program'){
              $getdata = programs::where('id', '=', $payable_id)->first();
              

            }if($type=='event'){
              $getdata = Events::where('id', '=', $payable_id)->first();

            }
            if($type=='eventsport'){
              $getdata = Eventsport::where('id', '=', $payable_id)->first();

            }
              if($c_id!=null)
            {
                      $cid=$c_id;//request()->route('c_id');
            
            }else{
              $cid=0;
            }
            

              $pymentconfig = $this->iniatePayment();
                if(isset($pymentconfig['access_token']) && !empty($pymentconfig['access_token'])){
                    $access_token=$pymentconfig['access_token'];
                }else{
                  $access_token='';
                }
                if(isset($pymentconfig['token_type']) && !empty($pymentconfig['token_type'])){
                    $token_type=$pymentconfig['token_type'];
                  }
                  else{
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
                      "ErrorUrl": "http://nuakw.com/admin/members/transactions"
                              }';
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
        }
        }
  public function callBack(){
             //call back to same index page after payment page redirect
 
      if(isset($_GET['paymentId'])){

        $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL,$this->data['basURL'].'/Token');
       curl_setopt($curl, CURLOPT_POST, 1);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
       curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $this->data['username'],'password' => $this->data['password'])));
       $result = curl_exec($curl);
       $error= curl_error($curl);
       $info = curl_getinfo($curl);
       curl_close($curl);
       $json = json_decode($result, true);
       $access_token= $json['access_token'];
       $token_type= $json['token_type'];
      if(isset($_GET['paymentId']))
       {
           $id=$_GET['paymentId'];
       }
       $password= $this->data['password'];
       $url = $this->data['basURL'].'/ApiInvoices/Transaction/'.$id;
       $soap_do1 = curl_init();
       curl_setopt($soap_do1, CURLOPT_URL,$url );
       curl_setopt($soap_do1, CURLOPT_CONNECTTIMEOUT, 10);
       curl_setopt($soap_do1, CURLOPT_TIMEOUT, 10);
       curl_setopt($soap_do1, CURLOPT_RETURNTRANSFER, true );
       curl_setopt($soap_do1, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($soap_do1, CURLOPT_SSL_VERIFYHOST, false);
       curl_setopt($soap_do1, CURLOPT_POST, false );
       curl_setopt($soap_do1, CURLOPT_POST, 0);
       curl_setopt($soap_do1, CURLOPT_HTTPGET, 1);
       curl_setopt($soap_do1, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Accept: application/json','Authorization: Bearer '.$access_token));
       $result_in = curl_exec($soap_do1);
       $err_in = curl_error($soap_do1);
       $file_contents = htmlspecialchars(curl_exec($soap_do1));
       curl_close($soap_do1);
       $getRecorById = json_decode($result_in, true);
      //  dd($getRecorById);
      //  exit;
    parse_str($getRecorById['ApiCustomFileds'],$ApiCustomFileds);
    $type=$ApiCustomFileds['type'];
   $payable_id=$ApiCustomFileds['payable_id'];
   $cost=$getRecorById['PaidCurrencyValue'];
   $mid=$ApiCustomFileds['member_id'];
   $cid=$ApiCustomFileds['coach_id'];

       $report = subscriptions::where('payable_id',  $payable_id)
       ->where('member_id' , $mid)
       ->where('payable_type' , $type)
        ->first();
       
       if(!$report){
        $query = new subscriptions();
        if($type=='eventsport'){
          $query->payable_type=$type;
          $query->member_id =$mid;
          $query->payable_id =$payable_id;
          $query->cost =$cost;
           $query->status='paid';

        }else{
          $query->payable_type=$type;
            $query->member_id =$mid;
            $query->payable_id =$payable_id;
            $query->cost =$cost;
            $query->coache_id=$cid;
            $query->status='paid';
        }
            //  $query->save();
            if ($query->save()) {
              if($type=='event'){
                $event=Events::findOrfail($payable_id);
                $nosubscriper=$event->no_of_attendees;
                 $event->no_of_attendees=$nosubscriper+1;
                 $event->save();
              }
              if($type=='eventsport'){
                $eventsport=Eventsport::findOrfail($payable_id);
                $nosubscriper=$eventsport->no_of_attendees;
                 $eventsport->no_of_attendees=$nosubscriper+1;
                 $eventsport->save();

              }
       $transaction = new transactions();
       $transaction->CustomerEmail = $getRecorById['CustomerEmail'];
       $transaction->payable_id = $payable_id;
       $transaction->payable_type = $type;
       $transaction->member_id = $mid;
       $transaction->InvoiceValue = $getRecorById['InvoiceValue'];
       $transaction->UnitPrice = $getRecorById['InvoiceItems'][0]['UnitPrice'];
       $transaction->ExtendedAmount = $getRecorById['InvoiceItems'][0]['ExtendedAmount'];
       $transaction->status = 'paid';
       $transaction->PaymentGateway = $getRecorById['PaymentGateway'];
       $transaction->Invoiceid= $getRecorById['InvoiceId'];
       $transaction->InvoiceReference= $getRecorById['InvoiceReference'];
       $transaction->TransactionId= $getRecorById['TransactionId'];
       $transaction->TrackId= $getRecorById['TrackId'];
       $transaction->OrderId= $getRecorById['OrderId'];
       $transaction->Currency= $getRecorById['Currency'];
       $transaction->ProductName= $getRecorById['InvoiceItems'][0]['ProductName'];
       $transaction->Quantity= $getRecorById['InvoiceItems'][0]['Quantity'];
       $ExpireDate = strtotime( $getRecorById['ExpireDate']);
       $ExpireDatenewformat = date('Y-m-d',$ExpireDate);
       $CreatedDate = strtotime( $getRecorById['CreatedDate']);
       $CreatedDatenewformat = date('Y-m-d',$CreatedDate);
       $transaction->ExpireDate= $ExpireDatenewformat;
       $transaction->CreatedDate= $CreatedDatenewformat;
       $transaction->InvoiceDisplayValue= $getRecorById['InvoiceDisplayValue'];
       $transaction->PaidCurrency= $getRecorById['PaidCurrency'];
       $transaction->PaidCurrencyValue= $getRecorById['PaidCurrencyValue'];
       $transaction->TransationValue= $getRecorById['TransationValue'];
       $transaction->CustomerServiceCharge= $getRecorById['CustomerServiceCharge'];
       $transaction->DueValue= $getRecorById['DueValue'];
        $transaction->PaymentId= $getRecorById['PaymentId'];
       $transaction->AuthorizationId= $getRecorById['AuthorizationId'];
       $TransactionDate = strtotime( $getRecorById['TransactionDate']);
      //  dd($TransactionDate);exit;
       $TransactionDatenewformat = date('Y-m-d', $TransactionDate);

      $transaction->TransactionDate= $getRecorById['TransactionDate'];
      // $TransactionDatenewformat;

      //  $transaction->save();
       if ($transaction->save()) {
         
        Session::forget('payable_id');
        Session::forget('type');
       Session::forget('CoachID');
       if($type=='event'){

        return redirect(route('memberclass'))->with([
            'message' => sprintf('subscribe: "%s" a success !',  $transaction->ProductName),
            'alert-type' => 'success'
        ]);
      }
      elseif($type=='eventsport'){
        return redirect(route('memberevent'))->with([
          'message' => sprintf('subscribe: "%s" a success !',  $transaction->ProductName),
          'alert-type' => 'success'
      ]);

      }
      else{
        return redirect(route('memberdashboard'))->with([
          'message' => sprintf('subscribe: "%s" a success !',  $transaction->ProductName),
          'alert-type' => 'success'
      ]);

      }         

    } else {
      Session::forget('payable_id');
      Session::forget('type');
      Session::forget('CoachID');
      if($type=='event'){
      redirect(route('memberclass'))->with([
            'message' => sprintf('subscribe: "%s" can not  success !', $transaction->ProductName),
            'alert-type' => 'error'
        ]);
      }else{
        redirect(route('memberdashboard'))->with([
          'message' => sprintf('subscribe: "%s" can not  success !', $transaction->ProductName),
          'alert-type' => 'error'
      ]);


      }
                     
    }
  }
    }else{
      if($type=='event'){
      return redirect( route('memberclass') )->with([ 'message' => sprintf('Oops! You have   Aleardy participated in the event ' ),
                'alert-type' => 'error'
                ]);
      } elseif($type=='eventsport'){
        return redirect(route('memberevent'))->with([
          'message' => sprintf('Oops! You have   Aleardy participated in the event ' ),
          'alert-type' => 'error'
      ]);

      }
      
      else{
        return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Oops! You have  Aleardy participated in the program ' ),
        'alert-type' => 'error'
        ]);

      }

}
     //end
   
   }

        


}
}