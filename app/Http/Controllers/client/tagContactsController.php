<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Audience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tagContactsController extends Controller
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
        $data = $this->validate($request, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required','max:10'],
            'tag_id' => ['required']
        ]);
        $name = $data['first_name']." ".$data['last_name'];
        Audience::create([
            'client' => Auth::user()->id,
           'tag_id' => $data['tag_id'],
           'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'email' => $data['email'],
          'phone' => $data['phone'],
        ]);

        return back()->with('message', 'Contact added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Audience::find($id);
        return view('client.tags.update', compact('id','contact'));
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
            'tag_id' => ['required']
        ]);
        $contact = Audience::find($id);
        $contact->update([
            'client' => Auth::user()->id,
            'tag_id' => $data['tag_id'],
            'first_name' => $data['first_name'],
           'last_name' => $data['last_name'],
           'email' => $data['email'],
           'phone' => $data['phone'],
        ]);

        return back()->with('message','Contact updated successfully');
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
