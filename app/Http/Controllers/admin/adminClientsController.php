<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::where('role','client')->where('is_verified',1)->latest()->get();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
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
            'username' => ['required','unique:users,username'],
            'company_name' => ['required'],
            'email' => ['required','unique:users,email'],
            'phone' => ['required']
        ]);

       $user = User::create([
        'name' => $data['company_name'],
        'email' => $data['email'],
        'password' => Hash::make('Password'),
        'username' => $data['username'],
        'primary_contact' => $data['phone'],
        'alt_contact' => $request->alt_phone,
        'location' => $request->location,
        'address' => $request->address,
        'api_key' => $request->api_key,
        'sender_id' => $request->sender_id,
        'verification_code' => sha1(time())
        ]);


        $resArr = [];
        $resArr['token'] = $user->createToken('api-application')->accessToken;
        $resArr['username'] = $user->name;

        if ($user) {
            # send email...
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            # redirect to show a message ...
            return back()->with('message','Client added successfully! Email verification required to verify and activate account!');
        } else {
            return back()->with('message','Something went wrong!');
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
        $client = User::findOrFail($id);
        $providers = Provider::latest()->get();
        return view('admin.clients.show', compact('client','providers','id'));

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
        $data = $this->validate($request, [
            'username' => ['required'],
            'company_name' => ['required'],
            'email' => ['required'],
        ]);
        $client = User::findOrFail($id);
        $client->update([
            'name' => $data['company_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'provider' => $request->provider,
            'sender_id' => $request->sender_id,
            'api_key' => $request->api_key
        ]);

        return back()->with('message','Client updated successfully!');


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
}
