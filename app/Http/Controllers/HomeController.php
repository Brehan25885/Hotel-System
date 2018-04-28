<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Client;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $email=Auth::user()->email;
        $client=Client::where('email',$email)->get();
        
        $id=$client[0]->id;
        
        return redirect()->route('clients.show', ['id' => $id]);
    }
}
