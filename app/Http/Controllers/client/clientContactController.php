<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('clientid', Auth::user()->id)->latest()->get();
        return view('client.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('client_id',Auth::user()->id)->latest()->get();
        return view('client.contacts.create', compact('tags'));
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required','max:10'],
        ]);
        $name = $data['first_name']." ".$data['last_name'];
        $code = Auth::user()->provider === 'at' ? '+254' : '254';
        $new_phone = $code.substr($data['phone'],1);
        $contact = new Contact();
        $contact->clientid = Auth::user()->id;
        $contact->first_name = $data['first_name'];
        $contact->last_name = $data['last_name'];
        $contact->name = $name;
        $contact->email = $request->email;
        $contact->phone = $new_phone;
        $contact->save();

        $tags = $request->tags; //insert tags with this contacts
        $contact->tags()->sync($tags);

        return back()->with('message','Contact added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = $id;
        $contact = Contact::findOrFail($id);
        $tags = Tag::all();
        return view('client.contacts.show', compact('id', 'contact','tags'));
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required','max:10'],
        ]);
        $name = $data['first_name']." ".$data['last_name'];
        $code = "+254";
        $new_phone = $code.substr($data['phone'],1);
        $contact = Contact::findOrFail($id);
        $contact->first_name = $data['first_name'];
        $contact->last_name = $data['last_name'];
        $contact->name = $name;
        $contact->email = $request->email;
        $contact->phone = $new_phone;
        $contact->save();

        $tags = $request->tags; //insert tags with this contacts
        $contact->tags()->sync($tags);


        return back()->with('message', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();
        return back();
    }
}
