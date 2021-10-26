<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('paid_by', Auth::user()->id)->latest()->get();
        return view('client.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validate($request, [
                'phone_number' => ['required','max:10'],
                'amount' => ['required']
        ]);
        $phone = $request->phone_number;
        $formatedphone = substr($phone,1); //743160199
        $code = "254";
        $phoneNumber = $code.$formatedphone;
         $id = Auth::user()->id;
        $curl_post_data = [
            'BusinessShortCode' => env('MPESA_SHORTCODE'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' =>$request->amount,
            'PartyA' => $phoneNumber,
            'PartyB' => env('MPESA_SHORTCODE'),
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => 'http://sms.teddygenial.com/api/mpesa/stk/push/callback/url/'.$id,
            'AccountReference' => 'Peak and Dale Solutions',
            'TransactionDesc' => 'Lipa Na Mpesa',
        ];
        $data_string = json_encode($curl_post_data);
        $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer '.$this->newAccessToken())); //setting a custom header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

       $curl_response = curl_exec($curl);
      //return $curl_response;
      return back()->with('message','Kindly complete the payment on stk push on your phone');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //get password
    public function lipaNaMpesaPassword()
    {
        // timestamp
        $timestamp = Carbon::rawParse('now')->format('YmdHms');
        //passkey
        $passkey = env('MPESA_PASS_KEY');
        //businessShortCode
        $businessShortCode = env('MPESA_SHORTCODE');
        //generate Password
        $mpesaPassword = base64_encode($businessShortCode.$passkey.$timestamp);

        return $mpesaPassword;
    }

  //get accessToken
    public function newAccessToken(){
        $consumer_key = env('MPESA_CONSUMER_KEY');
        $consumer_secret = env('MPESA_CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        //$url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials,'Content-Type:application/json')); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       $access_token = json_decode($curl_response);
       curl_close($curl);

       return $access_token->access_token;

    }

}
