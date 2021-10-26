<?php
namespace App\Helper;
use AfricasTalking\SDK\AfricasTalking;

use Exception;
use Illuminate\Support\Facades\Auth;

class Helper
{
   public static function getBalance(){
        //send SMS to recepients via africas talking
        //$username = Auth::user()->username; // use 'sandbox' for development in the test environment
        $username = 'peakanddale';
        $apiKey   = Auth::user()->api_key; // use your sandbox app API key for development in the test environment
        if (Auth::user()->provider === 'at') {
            $AT       = new AfricasTalking($username, $apiKey);

        // get the payments service
        $payments = $AT->application();

        try {
            $balance = $payments->fetchApplicationData();
            $data = $balance['data'];
            $response = $data->UserData->balance;
            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
        } else {
        $url="http://bulksms.mobitechtechnologies.com/api/account_balance";
        $ch = curl_init($url);
        $data = array(
            'api_key' => $apiKey,
            'username' => $username,
        );

        $payload = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        return $response->balance;
        }


   }
}
