<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\config;

class PaymentController extends Controller
{
    //
    public function makePyment(){
        if(isset($json['access_token']) && !empty($json['access_token'])){
            $access_token= $json['access_token'];
        }else{
          $access_token='';
        }
        if(isset($json['token_type']) && !empty($json['token_type'])){
            $token_type= $json['token_type'];
              }else{
                  $token_type='';
              }
              if(isset($json['access_token']) && !empty($json['access_token']))
              {
                echo "Token Generated Successfully.<br>";

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
           "CallBackUrl":  "route(memberevent)",
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
          print_r("Error: ".$json['error']."<br>Description: ".$json['error_description']);
          }

        }

    }
}
