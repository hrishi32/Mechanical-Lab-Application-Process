<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appl;

class RequestController extends Controller
{
    //
    public function pending()
    {
        $req = Appl::where('status', '0')->orderBy('created_at', 'desc')->paginate(10);
        return view("requests.pending")->with('reqs', $req);
    }

    public function approved()
    {
        $req = Appl::where('status', '2')->orderBy('created_at', 'desc')->paginate(10);
        return view("requests.approved")->with('appls', $req);
    }
}
