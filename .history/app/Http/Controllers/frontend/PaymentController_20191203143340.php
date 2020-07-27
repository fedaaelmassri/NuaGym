<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;

class PaymentController extends Controller
{
    //
    private $base_url='https://apidemo.myfatoorah.com';
    public function __construct()
    {
         $pymentconfig = config('paymentconfig');

    }
    public function makePyment(){
       $this->pymentconfig = config('paymentconfig');
        if(isset($pymentconfig['access_token']) && !empty($pymentconfig['access_token'])){
            $access_token=$this->pymentconfig['access_token'];
        }else{
          $access_token='';
        }
        if(isset($pymentconfig['token_type']) && !empty($pymentconfig['token_type'])){
            $token_type=$this->pymentconfig['token_type'];
              }else{
                  $token_type='';
              }
              if(isset($pymentconfig['access_token']) && !empty($pymentconfig['access_token']))
              {
                echo "Token Generated Successfully.<br>";
                $t= time();
                $name = "Demo Name";

        $post_string = '{
            "InvoiceValue": 10,
            "CustomerName": "'.$name.'",
            "CustomerBlock": "Block",
            "CustomerStreet": "Street",
            "CustomerHouseBuildingNo": "Building no",
            "CustomerCivilId": "123456789124",
            "CustomerAddress": "Payment Address",
            "CustomerReference": "'.$t.'",
            "DisplayCurrencyIsoAlpha": "KWD",
            "CountryCodeId": "+965",
            "CustomerMobile": "1234567890",
            "CustomerEmail": "test@gmail.com",
            "DisplayCurrencyId": 3,
            "SendInvoiceOption": 1,
            "InvoiceItemsCreate": [
              {
                "ProductId": null,
                "ProductName": "Product01",
                "Quantity": 1,
                "UnitPrice": 10
              }
            ],
           "CallBackUrl":  "http://www.google.com",
            "Language": 2,
             "ExpireDate": "2022-12-31T13:30:17.812Z",
  "ApiCustomFileds": "weight=10,size=L,lenght=170",
  "ErrorUrl": "http://www.bing.com"
          }';
        $soap_do     = curl_init();
       curl_setopt($soap_do, CURLOPT_URL, $this->base_url."/ApiInvoices/CreateInvoiceIso");
       curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
       curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
       curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
       curl_setopt($soap_do, CURLOPT_POST, true);
       curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
       curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Content-Length: ' . strlen($post_string),  'Accept: application/json','Authorization: Bearer '.$access_token));
       $result1 = curl_exec($soap_do);
      // echo "<pre>";print_r($result1);die;
       $err    = curl_error($soap_do);
      $json1= json_decode($result1,true);
      $RedirectUrl= $json1['RedirectUrl'];
      $ref_Ex=explode('/',$RedirectUrl);
      $referenceId =  $ref_Ex[3];
       curl_close($soap_do);

        echo '<br><button type="button" id="paymentRedirect"  class="btn btn-success">Click here to Payment Link</button>';
        echo'<script type="text/javascript">
        $("#paymentRedirect").click(function(e) {
          window.location="'.$RedirectUrl.'";
        });
        </script>';
          }else{
            //print_r($json);
          print_r("Error: ".$pymentconfig['error']."<br>Description: ".$pymentconfig['error_description']);
          }

        }
        public function callBack(){
             //call back to same index page after payment page redirect
      if(isset($_GET['paymentId'])){
        $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL,$this->base_url.'/Token');
       curl_setopt($curl, CURLOPT_POST, 1);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
       curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => 'apiaccount@myfatoorah.com','password' => 'api12345*')));
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
       $password= 'api12345*';
       $url = $this->base_url.'/ApiInvoices/Transaction/'.$id;
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
       echo'<div class="form-group "><label class="control-label" for="name">
       Invoice id : '.$getRecorById['InvoiceId'].'
        </label><br>';
        echo'<div class="form-group "><label class="control-label" for="name">
        InvoiceReference : '.$getRecorById['InvoiceReference'].'
         </label><br>';
       echo'<div class="form-group "><label class="control-label" for="name">
         CreatedDate : '.$getRecorById['CreatedDate'].'
          </label><br>';
       echo'<div class="form-group "><label class="control-label" for="name">
            ExpireDate : '.$getRecorById['ExpireDate'].'
             </label><br>';
     echo'<div class="form-group "><label class="control-label" for="name">
                  InvoiceValue : '.$getRecorById['InvoiceValue'].'
                   </label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 Comments : '.$getRecorById['Comments'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 CustomerName : '.$getRecorById['CustomerName'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 CustomerMobile : '.$getRecorById['CustomerMobile'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 CustomerEmail : '.$getRecorById['CustomerEmail'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 TransactionDate : '.$getRecorById['TransactionDate'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 TransactionDate : '.$getRecorById['TransactionDate'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 PaymentGateway : '.$getRecorById['PaymentGateway'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 ReferenceId : '.$getRecorById['ReferenceId'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 TrackId : '.$getRecorById['TrackId'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 TransactionId : '.$getRecorById['TransactionId'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 PaymentId : '.$getRecorById['PaymentId'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 AuthorizationId : '.$getRecorById['AuthorizationId'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 OrderId : '.$getRecorById['OrderId'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 TransactionStatus : '.$getRecorById['TransactionStatus'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 Error : '.$getRecorById['Error'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 PaidCurrency : '.$getRecorById['PaidCurrency'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 PaidCurrencyValue : '.$getRecorById['PaidCurrencyValue'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 TransationValue : '.$getRecorById['TransationValue'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 CustomerServiceCharge : '.$getRecorById['CustomerServiceCharge'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 DueValue : '.$getRecorById['DueValue'].'</label><br>';
 echo'<div class="form-group "><label class="control-label" for="name">
 Currency : '.$getRecorById['Currency'].'</label><br>';
   }

        }


}
