<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appl;
use Auth;
// use App\Post;

class ApplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level <3)
        {    
            $appls = Appl::orderBy('created_at', 'desc')->paginate(10);
            return view("appl.index")->with('appls',$appls );
        }
        elseif(Auth::user()->level == 3)
        {
            $appls = Appl::where('sender', Auth::user()->roll_no)->orderBy('created_at', 'desc')->paginate(10);
            return view("appl.index")->with('appls',$appls );
        }
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
            'comments' => 'required',
            'material_provider' => 'required',
            'cost' => 'required'
        ]);
        
        $post = new Appl;
        $post->sender = Auth::user()->roll_no;
        $post->material_provider = $request->input('material_provider');
        $post->cost = $request->input('cost');
        $post->comments = $request->input('comments');
        $post->imgsrc = "none.png";
        $post->status = 0;
        $post->save();
        return redirect('/appl')->with('success', 'Application Created');
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
        $appl = Appl::find($id);
        return view('appl.review')->with('appl', $appl);
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
        $this->validate($request, 
        [
            'comments' => 'required',
            'material_provider' => 'required',
            'cost' => 'required'
        ]);

        if(Auth::user()->level < 3 || (Auth::user()->roll_no == $appl->sender && $appl->status == 0))
        {            
            $post = Appl::find($id);
            $post->sender = Auth::user()->roll_no;
            $post->material_provider = $request->input('material_provider');
            $post->cost = $request->input('cost');
            $post->comments = $request->input('comments');
            $post->imgsrc = "none.png";
            $post->status = 0;
            $post->save();
            return redirect('/appl')->with('success', 'Application Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Appl::find($id);
        $post->delete();
        return redirect('/appl')->with('success', 'Application Removed');
    }

    public function approve($id)
    {
        if(Auth::user()->level == 1)
        {
            $appl = Appl::find($id);
            $appl->status = 2;
            $appl->save();
            return redirect('/appl')->with('success', 'Application Approved');
        }
        return redirect('/appl')->with('error', 'Access Denied');
    }

    public function decline($id)
    {
        if(Auth::user()->level == 1)
        {
            $appl = Appl::find($id);
            $appl->status = -1;
            $appl->save();
            return redirect('/appl')->with('success', 'Application Declined');
        }
        return redirect('/appl')->with('error', 'Access Denied');
    }
}
