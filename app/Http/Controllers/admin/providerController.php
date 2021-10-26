<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class providerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::latest()->get();
        return view('admin.provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.provider.create");
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
            'provider_name' => ['required'],
            'provider_username' => ['required','unique:providers,provider_username']
        ]);
        Provider::create([
            'provider_name' => $data['provider_name'],
            'provider_username' => $data['provider_username'],
            'rate' => $request->rate,
        ]);

        return back()->with('message','Provider saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::findOrFail($id);
        return view('admin.provider.show', compact('provider','id'));
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
        $provider = Provider::findOrFail($id);
        $data = $this->validate($request, [
            'provider_name' => ['required'],
            'provider_username' => ['required']
        ]);
        $provider->update([
            'provider_name' => $data['provider_name'],
            'provider_username' => $data['provider_username'],
            'rate' => $request->rate,
        ]);
        return back()->with('message','Provider updated successfully!');
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
