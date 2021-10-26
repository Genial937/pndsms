<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Audience;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::where('client_id', Auth::user()->id)->latest()->get();
        return view('client.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.tags.create');
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
           'tag_name' => ['required'],
       ]);
       Tag::create([
           'client_id' => Auth::user()->id,
           'tag_name' => $data['tag_name'],
       ]);
       return back()->with('message','Tag has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('client.tags.show', compact('id', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Audience::where('tag_id',$id)->get();
        $tag = Tag::find($id);
        return view('client.tags.edit', compact('id','tag','contacts'));
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
        $tag = Tag::findOrFail($id);
        $data = $this->validate($request, [
            'tag_name' => ['required']
        ]);
        $tag->update([
            'tag_name' => $data['tag_name'],
        ]);
        return back()->with('message', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return back();
    }
}
