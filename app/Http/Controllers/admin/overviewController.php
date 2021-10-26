<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Contact;
use App\Models\Payment;

class overviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::find($id);
        $sms = Message::where('company_id', $id)->get()->count();
        $balance = $this->getBalance();
        $total = Message::where('company_id', $id)->get()->sum('sold_at');
        $payments = Payment::where('paid_by', $id)->latest()->get();
        $contacts = Contact::where('clientid',$id)->latest()->get();
        $username = $client->username; // use 'sandbox' for development in the test environment
        $apiKey   = $client->api_key; // use your sandbox app API key for development in the test environment
        if ($client->provider === 'at') {
            $AT       = new AfricasTalking($username, $apiKey);

            // get the payments service
            $payments = $AT->application();

            try {
                $balance = $payments->fetchApplicationData();
                $data = $balance['data'];
                $response = $data->UserData->balance;
                $balance =  $response;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            $url = "http://bulksms.mobitechtechnologies.com/api/account_balance";
            $ch = curl_init($url);
            $data = array(
                'api_key' => $apiKey,
                'username' => $username,
            );

            $payload = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result);
            $balance = $response->balance;
        }
        return view('admin.details', compact('client', 'sms','balance','total','payments','contacts'));
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


    private function getBalance(){
        //send SMS to recepients via africas talking
        $username = 'Thadeus'; // use 'sandbox' for development in the test environment
        $apiKey   = '5e0a291b75721efcd3d97e70de1c31242bbf7964cc968d47e20ff0eab311c532'; // use your sandbox app API key for development in the test environment
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
    }
}
