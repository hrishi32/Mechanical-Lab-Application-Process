<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appl;
// use App\Post;

class ApplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appls = Appl::orderBy('created_at', 'desc')->paginate(10);
        return view("appl.index")->with('appls',$appls );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appl.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'user' => 'required',
            'comments' => 'required',
            'material_provider' => 'required',
            'cost' => 'required'
        ]);
        
        $post = new Appl;
        $post->sender = $request->input('user');
        $post->material_provider = $request->input('material_provider');
        $post->cost = $request->input('cost');
        $post->comments = $request->input('comments');
        $post->imgsrc = "none.png";
        $post->save();
        return redirect('/appl')->with('success', 'post created');
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
}
