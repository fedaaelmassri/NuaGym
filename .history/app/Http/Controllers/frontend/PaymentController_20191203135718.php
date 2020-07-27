<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;

class PaymentController extends Controller
{
    //
    public function makePyment(){
        $pymentconfig = config('paymentconfig');

        if(isset($pymentconfig['access_token']) && !empty($pymentconfig['access_token'])){
            $access_token= $pymentconfig['access_token'];
        }else{
          $access_token='';
        }
        if(isset($pymentconfig['token_type']) && !empty($pymentconfig['token_type'])){
            $token_type= $pymentconfig['token_type'];
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
       curl_setopt($soap_do, CURLOPT_URL, "https://apidemo.myfatoorah.com/ApiInvoices/CreateInvoiceIso");
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
      $referenceId =  $ref_Ex[4];
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


}
