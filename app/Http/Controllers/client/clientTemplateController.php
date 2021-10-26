<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::where('company_id', Auth::user()->id)->latest()->get();
        return view('client.templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.templates.create');
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
            'template_name' => ['required'],
            'body' => ['required']
        ]);
        //icon
        $icon_name = "";
        if ($request->has('icon')) {
           $icon = $request->file('icon');
           $icon_name = $icon->getClientOriginalName();
           $icon->move(public_path('icons'), $icon_name);
        }
        Template::create([
            'company_id' => Auth::user()->id,
            'template_name' => $data['template_name'],
            'icon' => $icon_name,
            'body' => $data['body'],
        ]);

        return back()->with('message','Template added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = Template::findOrFail($id);
        return view('client.templates.show', compact('template','id'));
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
            'template_name' => ['required'],
            'body' => ['required']
        ]);
        $template = Template::find($id);
        $icon_name = $template->icon;
        if ($request->has('icon')) {
            $icon = $request->file('icon');
            $icon_name = $icon->getClientOriginalName();
            $icon->move(public_path('icons'), $icon_name);
         }
         $template->update([
            'template_name' => $data['template_name'],
            'icon' => $icon_name,
            'body' => $data['body'],
         ]);
         return back()->with('message','Template updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Template::findOrFail($id)->delete();
        return back();
    }
}
