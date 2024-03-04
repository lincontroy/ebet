<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function payments(Request $request){
        $fp = fopen('payments.txt', 'w');
        fwrite($fp, $request->BillRefNumber);
        fclose($fp);
    }
    public function registerurl(){
        $consumer_key='hPenbb0kTzvAkVF6Oad2EHJQ0o2AzaLdAo5w5dAilAoW8Swy';
        $consumer_secret='JlkraxnOqhyGIJGsa8CmAWzjjDGKQEVgBWTCqM5gDhArJUd1ck0j6wlze7I4ibyY';

        $headers=['Content-Type:application/json; charset-utf8'];
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init( $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_USERPWD, $consumer_key.':'.$consumer_secret);
        $result=curl_exec($curl);
        $status=curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result=json_decode($result);
        $access_token= $result->access_token;


        $url = 'https://api.safaricom.co.ke/mpesa/c2b/v2/registerurl';  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer '.$access_token)); //setting custom header  
        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'ShortCode' => '4123803',
            'ResponseType' => 'Completed',
            'ConfirmationURL' => 'https://secretgardentips.com/api/v1/payments',
            'ValidationURL' => 'https://secretgardentips.com/api/v1/payments'
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        print_r($curl_response);
        echo $curl_response;
            }
            //

        
    public function sendstk(Request $request){

        $mobile=$request->phone;
        $amount=$request->amount;
        $account=$request->account;
        
        $consumerKey = "hPenbb0kTzvAkVF6Oad2EHJQ0o2AzaLdAo5w5dAilAoW8Swy"; //Fill with your app Consumer Key
          $consumerSecret = "JlkraxnOqhyGIJGsa8CmAWzjjDGKQEVgBWTCqM5gDhArJUd1ck0j6wlze7I4ibyY"; // Fill with your app Secret
        
          # define the variales
          # provide the following details, this part is found on your test credentials on the developer account
          $BusinessShortCode ="4123803";
          $Passkey = "df1fb169d23fc5270fd83529d544656dc44ba5636a988205d5dbc82c84f66150";
          
          
          
          $PartyA = $mobile; // This is your phone number, 
          $AccountReference = $account;
          $TransactionDesc = $account;
          $Amount = $amount;
         
          # Get the timestamp, format YYYYmmddhms -> 20181004151020
          $Timestamp = date('YmdHis');    
          
          # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
          $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
        
          # header for access token
          $headers = ['Content-Type:application/json; charset=utf8'];
        
            # M-PESA endpoint urls
          $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
          $initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
          # callback url
          $CallBackURL = "https://secretgardentips.com/api/v1/payments";  
        
          $curl = curl_init($access_token_url);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($curl, CURLOPT_HEADER, FALSE);
          curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
          $result = curl_exec($curl);
          $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          $result = json_decode($result);
          $access_token = $result->access_token;  
          curl_close($curl);
        
          # header for stk push
          $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
        
          # initiating the transaction
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $initiate_url);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
        
          $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $Password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $BusinessShortCode,
            'InvoiceNumber'=>'https://secretgardentips.com/api/v1/payments',
            'PhoneNumber' => $PartyA,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
          );
        
          $data_string = json_encode($curl_post_data);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
          $curl_response = curl_exec($curl);
        //   print_r($curl_response);
        
        //   echo $curl_response;
          
        //   exit;
        $response=json_decode($curl_response);

        return $response;
     
    }
}
