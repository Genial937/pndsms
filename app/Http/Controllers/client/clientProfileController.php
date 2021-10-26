<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\OauthAccessToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lcobucci\JWT\Token\Parser;
use AfricasTalking\SDK\AfricasTalking;

class clientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $token = OauthAccessToken::where('user_id', Auth::user()->id)->first();
        $token = User::where('users.id', Auth::user()->id)->with('accessTokens')->first();
        //$api = $token->accessTokens->id;
        $balance = $this->getBalance();
        $total = Message::where('company_id', Auth::user()->id)->get()->sum('sold_at');
        $sms = Message::where('company_id', Auth::user()->id)->get()->count();

        return view('client.profile.index', compact('token','sms','balance'));
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
        return view('client.profile.create');
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
        $data = $this->validate($request,[
            'email' => ['required'],
            'phone' => ['required']
        ]);
        $user = User::find($id);
        $profile_name = Auth::user()->profile;
        if ($request->has('profile')) {
            $profile = $request->file('profile');
            $profile_name = $profile->getClientOriginalName();
            $profile->move(public_path('img/profiles'), $profile_name);
        }
        $user->update([
            'email' => $data['email'],
            'primary_contact' => $data['phone'],
            'alt_contact' => $request->alt_phone,
            'profile' => $profile_name
        ]);
        return back()->with('message','User information updated successfully!');
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

    public function changePassword(Request $request, $id){
        $data = $this->validate($request, [
            'current_password' => ['required'],
            'new_password' => ['required', 'same:password_confirmation', 'min:6'],
            'password_confirmation' => ['required','min:6']
        ]);
        if (Hash::check($request->current_password, auth()->user()->password)) {
            User::where('id',$id)->update([
                'password' => Hash::make($data['new_password']),
            ]);
            return back()->with('msg', 'Password changed successfully!');
        } else {
            return back()->with('msg', 'Incorrect current password');
        }

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
