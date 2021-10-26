<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class paymentResponseController extends Controller
{
     //save response from call back url to database
     public function MpesaResponse(Request $request, $id){
        $feedback = $request->getContent();
        $response = json_decode($feedback);
        $data = $response->Body->stkCallback->CallbackMetadata->Item;
        $phone = $data[3]->Value;
        $amount = $data[0]->Value;
        $transaction = $data[1]->Value;
        $date = $data[2]->Value;

        Payment::create([
            'paid_by' => $id,
            'response' => $feedback,
            'amount' => $amount,
            'mpesa_receipt' => $transaction,
            'transaction_date' => $date,
            'phone' => $phone,
        ]);

    }
}
