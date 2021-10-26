<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Audience;
use App\Models\Message;

class clientSMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('clientid',Auth::user()->id)->get();
        $tags = Tag::where('client_id', Auth::user()->id)->get();
        return view('client.sms.index', compact('contacts','tags'));
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
        $data = $this->validate($request, [
            'message' => ['required'],
        ]);
        $mobile = $request->mobile;
        $tag = $request->tag;
        $contact = $request->contact;
        $receiver = '';
        if($mobile == '' && $tag == '' && $contact == ''){
            return back()->with('notice', 'Please select a receiver');
        }elseif($mobile != '' && $tag != ''){
            return back()->with('notice','A receiver can only be  contact, a tag or selected contacts');
        }elseif($mobile != '' && $contact != ''){
            return back()->with('notice','A receiver can only be  contact, a tag or selected contacts');
        }elseif($tag != '' && $contact != ''){
            return back()->with('notice','A receiver can only be  contact, a tag or selected contacts');
        }elseif($contact != ''){
            $tel = substr($contact,1);

            $code = Auth::user()->provider === 'at' ? '+254' : '254';

           $receiver = $code.$tel;

        }elseif($tag != ''){
            $tagid = $tag;
            $parent_tag = Tag::findOrFail($tag);

            // $tag_contacts = Audience::where('tag_id',$tagid)->get();
            $phone = '';
            foreach ($parent_tag->contacts as $tag) {
               $tel =  $tag->phone;
               $phone .= $tel;
            }
            $arr  = Auth::user()->provider === 'at' ? str_split($phone,'13') : str_split($phone,'12');
            $to = implode(',',$arr);
            $receiver = $to;
        }elseif($mobile != ''){
            $postData = $request->all();
            $mobile = implode('',$postData['mobile']);
            $arr  = Auth::user()->provider === 'at' ? str_split($mobile,'13'): str_split($mobile,'12');
            $to = implode(',',$arr);
             $receiver = $to;
            // dd($receiver);
        }
        //dd(Auth::user()->id);

        //save sms to db
        $dbcontacts = explode(',',$receiver);
        $send_message = new Message();
        $insert = [];
                foreach($dbcontacts as $row)
                {
                    $text = [
                        'to'=>$row,
                        'from' => '',
                        'message' => $data['message'],
                        'company_id' => Auth::user()->id,
                        'sold_at' => 1,
                        'createdOn' => now(),
                    ];
                    $insert[] = $text;
                }
        $send_message->insert($insert);

       //send SMS to recepients via africas talking
       $sender_id = Auth::user()->sender_id;
        $username = 'peakanddale'; // use 'sandbox' for development in the test environment
        $apiKey   = Auth::user()->api_key; // use your sandbox app API key for development in the test environment
        //if sevice provider is africa's talking

        if (Auth::user()->provider === 'at') {
            $AT       = new AfricasTalking($username, $apiKey);

            // Get one of the services
             $sms      = $AT->sms();

             try {
                $results   = $sms->send([
                    'to'      => $receiver,
                    'message' => $data['message'],
                    ]);
            // $array = (object)$results;
            // $data  = $array->data->SMSMessageData->Recipients;
            // $b = json_decode(json_encode($data), true);
             // dd($b);
            // $keys = array_keys($b);
            // for($i = 0; $i < count($b); $i++) {
                // echo $keys[$i];
            //     foreach($b[$keys[$i]] as $key => $value) {
            //         echo $key . " : " . $value . "<br>";
            //     }
            //     echo "<hr>";
            // }

            //  return $result;
            if($results){
                return back()->with('message', 'SMS send successfully!');
            }
             } catch (Exception $e) {
                return back()->with('message', ''.$e->getMessage());
             }
        } elseif(Auth::user()->provider === 'mobi') {
            # if service provider is mobi tech.
            $message = $request->message;
            $recepient = $request->phone;
            foreach ($request->mobile as $key => $receiver) {
                $this->send_sms($apiKey, $username, $sender_id, $message, $receiver);
            }
            return back()->with('message', 'SMS send successfully!');
        } else{
            return back()->with('message', 'No sms provider assigned!');
        }



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

    private function send_sms($apiKey, $username, $sender_id, $message, $receiver){
        $url="https://bulk.api.mobitechtechnologies.com/api/sendsms";
            $ch = curl_init($url);
            $data = array(
                'api_key' => $apiKey,
                'username' => $username,
                'sender_id' => $sender_id,
                'message' => $message,
                'phone' => $receiver,
            );

            $payload = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            $result = curl_exec($ch);
            curl_close($ch);
            //dd($result);
    }
}
