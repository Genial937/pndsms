<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class adminContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searched = null;
        $contacts = Contact::orderBy('contacts.created_at')
        ->join('users','users.id','=','contacts.clientid')
        ->get(['contacts.name as name','contacts.email as email','contacts.phone as phone','users.name as company']);
        $clients = User::where('role','client')->latest()->get();
        return view('admin.contacts.index', compact('contacts','clients','searched'));
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

    public function search(Request $request){
        $searched = $request->client;
        $contacts = Contact::orderBy('contacts.created_at')
        ->where('clientid',$searched)
        ->join('users','users.id','=','contacts.clientid')
        ->get(['contacts.name as name','contacts.email as email','contacts.phone as phone','users.name as company']);
        $clients = User::where('role','client')->latest()->get();
        return view('admin.contacts.index', compact('contacts','searched','clients'));
    }
}
