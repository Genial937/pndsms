<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Message;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Auth;

class clientHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balance = $this->getBalance();
        $total = Message::where('company_id', Auth::user()->id)->get()->sum('sold_at');
        $sms = Message::where('company_id', Auth::user()->id)->get()->count();
        $payments = Payment::where('paid_by', Auth::user()->id)->latest()->get();
        return view('client.index', compact('balance','total','sms','payments'));
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
